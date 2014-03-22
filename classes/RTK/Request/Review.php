<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \Exception;
use \Core\Access;
use \Core\Core;
use \Core\Input\Integer as IntegerInput;
use \Core\Input\String as StringInput;
use \Core\XML\Reader as XMLReader;
use \RTK\Request;

class Review extends Request
{
    public function GetResponse()
    {
        switch( $this->method )
        {
            case 'POST':
            {
                return $this->UpdateCart();
            }

            case 'GET':
            {
                return $this->GetReviewContent();
            }

            default:
            {
                return $this->Forbidden();
            }
        }
    }

    protected function GetReviewContent()
    {
        // FIXME: move to a common place? Use traits?
        $cartContent = array();

        $sess = $this->session->Open();

        if( isset( $sess[ 'cart' ] ) )
        {
            $cartContent = $sess[ 'cart' ];
        }

        unset( $sess );

        $view = $this->app->View( 'Review' );
        $view->products = $this->GetProductList( $cartContent );

        return $view;
    }

    protected function GetProductList( $cartContent )
    {
        foreach( $cartContent as $prodId => $unitCount )
        {
            $prod = $this->app->db->GetProduct( $prodId );

            yield
            [
                'id' => $prod->id,
                'name' => $prod->name,
                'unitType' => $prod->unitType,
                'unitAmount' => $prod->unitAmount,
                'unitPrice' => $prod->unitPrice,
                'unitCount' => $unitCount,
                'minUnits' => $prod->minUnits,
                'maxUnits' => $prod->maxUnits
            ];
        }
    }

    protected function UpdateCart()
    {
        $xml = new XMLReader;
        $xmlns = $this->app->cfg->xmlns;
        $cartContent = array();

        $xml->onElem = function( $name, $ns ) use( $xmlns, &$cartContent )
        {
            if( $ns !== $xmlns )
            {
                return;
            }

            if( $name == 'cart' )
            {
                $this->onElem = function( $name, $ns ) use( $xmlns, &$cartContent )
                {
                    if( $ns !== $xmlns )
                    {
                        return;
                    }

                    if( $name == 'product' )
                    {
                        $id = null;
                        $units = null;

                        $this->onAttr = function( $name, $value, $ns ) use( $xmlns, &$id, &$units )
                        {
                            switch( $ns )
                            {
                                // http://www.w3.org/TR/REC-xml-names/#defaulting
                                case '':
                                case $xmlns:
                                {
                                    break;
                                }

                                default:
                                {
                                    return;
                                }
                            }

                            switch( $name )
                            {
                                case 'id':
                                {
                                    StringInput::Validate( $value, UNDEFINED, array
                                    (
                                        'length.min' => 1,
                                        'length.max' => 255
                                    ));

                                    $id = $value;
                                    break;
                                }

                                case 'units':
                                {
                                    IntegerInput::Validate( $value, UNDEFINED, array
                                    (
                                        'unsigned' => true,
                                        'min' => 1
                                    ));

                                    $units = $value;
                                    break;
                                }

                                default:
                                {
                                    break;
                                }
                            }
                        };

                        $this->onEmpty = function() use( &$cartContent, &$id, &$units )
                        {
                            Core::Assert( $id !== null );
                            Core::Assert( $units !== null );
                            Core::Assert( !array_key_exists( $id, $cartContent ) );

                            $cartContent[ $id ] = $units;
                        };
                    }
                };
            }
        };

        try
        {
            $xml->parse( 'php://input' );
        }
        catch( Exception $e )
        {
            // FIXME: For the moment the exception is suppressed (message ignored,
            // not logged), but it would be good to write it down for later reference
            // in the future.
            return $this->Error();
        }

        $sess = $this->session->Open( Access::READWRITE );
        $sess[ 'cart' ] = $cartContent;

        return $this->Success();
    }
}
<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \RTK\Request;

class Index extends Request
{
    public function GetResponse()
    {
        // FIXME: move to a common place?
        $cartContent = array();

        $sess = $this->session->Open();

        if( isset( $sess[ 'cart' ] ) )
        {
            $cartContent = $sess[ 'cart' ];
        }

        unset( $sess );

        $view = $this->app->View( 'Categories' );
        $view->categories = $this->GetCategoryList( $cartContent );

        return $view;
    }

    protected function GetCategoryList( $cartContent )
    {
        $isFirst = true;

        foreach( $this->app->db->GetCategories() as $cat )
        {
            yield
            [
                'id' => $cat->id,
                'name' => $cat->name,
                'selected' => $isFirst,
                'products' => $this->GetProductList( $cat, $cartContent )
            ];

            $isFirst = false;
        }
    }

    protected function GetProductList( $cat, $cartContent )
    {
        foreach( $cat->GetProducts() as $prod )
        {
            $unitCount = 0;

            if( array_key_exists( $prod->id, $cartContent ) )
            {
                $unitCount = $cartContent[ $prod->id ];
            }

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
}
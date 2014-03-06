<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \RTK\Request;

class Order extends Request
{
    public function GetResponse()
    {
        $view = $this->app->View( 'Order' );
        $view->shippingCost = $this->GetShippingCost();
        $view->itemCost = $this->GetItemCost();

        return $view;
    }

    protected function GetItemCost()
    {
        // FIXME: move to a common place? Use traits?
        $cartContent = array();

        $sess = $this->session->Open();

        if( isset( $sess[ 'cart' ] ) )
        {
            $cartContent = $sess[ 'cart' ];
        }

        unset( $sess );

        $totalPrice = '0.0';

        foreach( $cartContent as $prodId => $unitCount )
        {
            $prod = $this->app->db->GetProduct( $prodId );
            $totalPrice = bcadd( $totalPrice, $prod->GetPrice( $unitCount ), 2 );
        }

        return $totalPrice;
    }

    protected function GetShippingCost()
    {
        return '1';
    }
}
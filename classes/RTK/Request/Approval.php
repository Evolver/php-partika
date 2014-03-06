<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \Core\Access;
use \Core\DateTime;
use \Core\Input\String as StringInput;
use \RTK\Request;

class Approval extends Request
{
    public function GetResponse()
    {
        if( $this->method !== 'POST' )
        {
            return $this->notFound();
        }

        StringInput::Validate( $this->args[ 'shippingAddress' ] );
        StringInput::Validate( $this->args[ 'shippingTime' ] );
        StringInput::Validate( $this->args[ 'contactPhone' ] );
        StringInput::Validate( $this->args[ 'name' ] );

        $order = $this->app->Data( 'Order' );
        $order->code = mt_rand( 10000, 99999 ) . '-' . mt_rand( 10, 99 );
        $order->shippingAddress = $this->args[ 'shippingAddress' ];
        $order->shippingDate = $this->args[ 'shippingTime' ];
        $order->contactPhone = $this->args[ 'contactPhone' ];

        $view = $this->app->View( 'Approval' );
        $view->order = $order;

        $this->ClearCart();

        return $view;
    }

    protected function ClearCart()
    {
        // FIXME: move to a common place?
        $sess = $this->session->Open( Access::READWRITE );
        unset( $sess[ 'cart' ] );
    }
}
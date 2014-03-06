<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\View;

use \RTK\View;

class Order extends View
{
    public $shippingCost;

    public $itemCost;

    public function GetXHTML()
    {
        $tpl = $this->app->Template( 'Page' );
        $tpl->title = '3. solis - Ievadi pasūtījuma datus';
        $tpl->CSS->stylesheets[] = 'order.page.css';

        $tpl->JavaScript->scripts[] = 'https://maps.googleapis.com/maps/api/js?key=' .
                                      urlencode( $this->app->cfg->googleMapsAPIKey ) .
                                      '&v=3&sensor=false&language=lv&region=LV';
        $tpl->JavaScript->scripts[] = 'app/scripts/geolocation.js';
        $tpl->JavaScript->scripts[] = 'order.page.js';

        $tpl->Header->Cart = false;

        $tpl->Content = $tpl[ 'Content/Order' ];
        $tpl->Content->shippingCost = $this->shippingCost;
        $tpl->Content->itemCost = $this->itemCost;

        return $tpl;
    }
}
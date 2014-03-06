<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\View;

use \RTK\View;

class Review extends View
{
    public $products = array();

    public function GetXHTML()
    {
        $tpl = $this->app->Template( 'Page' );
        $tpl->title = '2. solis - Apstiprini groza saturu';
        $tpl->JavaScript->scripts[] = 'order.common.js';
        $tpl->JavaScript->scripts[] = 'review.page.js';
        $tpl->CSS->stylesheets[] = 'review.page.css';
        $tpl->Header->Cart->Actions->actions = [ 'checkout', 'return' ];
        $tpl->Content = $tpl[ 'Content/Review' ];
        $tpl->Content->products = $this->products;
        return $tpl;
    }
}
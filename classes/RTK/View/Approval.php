<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\View;

use \RTK\View;
use \RTK\Data\Order;

class Approval extends View
{
    /**
     * @var Order
     */
    public $order;

    public function GetXHTML()
    {
        $tpl = $this->app->Template( 'Page' );
        $tpl->title = 'Paldies par pirkumu!';
        $tpl->CSS->stylesheets[] = 'approval.page.css';
        $tpl->Header->Cart = false;

        $tpl->Content = $tpl[ 'Content/Approval' ];
        $tpl->Content->order = $this->order;

        return $tpl;
    }
}
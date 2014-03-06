<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\View;

use \RTK\View;

class Categories extends View
{
    public $categories = array();

    public function GetXHTML()
    {
        $tpl = $this->app->Template( 'Page' );
        $tpl->title = '1. solis - Izvēlies produktus';
        $tpl->JavaScript->scripts[] = 'order.common.js';
        $tpl->JavaScript->scripts[] = 'index.page.js';
        $tpl->CSS->stylesheets[] = 'index.page.css';
        $tpl->Content = $tpl[ 'Content/Select' ];
        $tpl->Content->Categories->categories = $this->categories;

        return $tpl;
    }
}
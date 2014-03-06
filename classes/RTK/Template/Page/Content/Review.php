<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Content;

use \RTK\Template;

class Review extends Template
{
    public $products = array();

    protected function GetDefaultSelectedProducts()
    {
        return function( $list )
        {
            $tpl = $this->app->Template( 'Page/Content/Select/Products' );
            $tpl->products = $list;
            $tpl();
        };
    }
}
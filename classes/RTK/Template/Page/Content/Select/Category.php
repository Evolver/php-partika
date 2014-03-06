<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Content\Select;

use \Core\Input;
use \RTK\Template;

class Category extends Template
{
    public $id;

    public $name = 'Unnamed';

    public $selected = false;

    public $products = array();

    protected function GetDefaultProducts()
    {
        return function( $list )
        {
            $tpl = $this->app->Template( 'Page/Content/Select/Products' );
            $tpl->products = $list;
            $tpl();
        };
    }
}
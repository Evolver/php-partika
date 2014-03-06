<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Content\Select;

use \RTK\Template;

class Products extends Template
{
    public $products = array();

    protected function GetDefaultProduct()
    {
        return function( $prod )
        {
            $tpl = $this->app->Template( 'Page/Content/Select/Product' );

            foreach( $prod as $key => $value )
            {
                $tpl->{ $key } = $value;
            }

            $tpl();
        };
    }
}
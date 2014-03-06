<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Content\Select;

use \RTK\Template;

class Categories extends Template
{
    public $title = 'Produktu kategorijas';

    public $categories = array();

    protected function GetDefaultCategory()
    {
        return function( $cat )
        {
            $tpl = $this->app->Template( 'Page/Content/Select/Category' );

            foreach( $cat as $key => $value )
            {
                $tpl->{ $key } = $value;
            }

            $tpl();
        };
    }
}
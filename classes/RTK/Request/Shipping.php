<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \RTK\Request;

class Shipping extends Request
{
    public function GetResponse()
    {
        $tpl = $this->app->Template( 'Page', 'Page/Info' );
        $tpl->title = 'Piegāde';
        $tpl->Header->Cart = false;
        $tpl->Content->Content = $tpl[ 'Content/Info/Shipping' ];

        return $tpl;
    }
}
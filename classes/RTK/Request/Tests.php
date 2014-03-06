<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Request;

use \RTK\Request;

class Tests extends Request
{
    public function GetResponse()
    {
        $this->resp->name = 'Test results.txt';

        return $this->app->Template( 'Tests' );
    }
}
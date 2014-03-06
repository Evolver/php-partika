<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page;

use \RTK\Template\Page;

class Info extends Page
{
    protected function GetDefaultContent()
    {
        return $this[ 'Content/Info' ];
    }
}
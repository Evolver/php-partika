<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template;

use \Core\Input;
use \RTK\Template;

class Page extends Template
{
    public $title;

    public $descr;

    protected function GetDefaultHeader()
    {
        $tpl = $this[ 'Header' ];
        $tpl->title = $this->title;
        return $tpl;
    }
}
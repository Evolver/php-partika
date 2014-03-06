<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page;

use \Core\Input;
use \RTK\Template;

class Header extends Template
{
    public $title;

    protected function GetDefaultTitle()
    {
        $tpl = $this[ 'Title' ];
        $tpl->title = $this->title;
        return $tpl;
    }
}
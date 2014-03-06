<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Header\Cart\Actions;

use \Core\Input;
use \RTK\Template;

class Action extends Template
{
    public $class = 'proceed';

    public $href = 'javascript: void;';

    public $title = '#Untitled';

    public $label = '#No label';
}
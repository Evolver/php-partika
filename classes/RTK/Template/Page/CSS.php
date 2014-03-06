<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page;

use \Core\Input;
use \RTK\Template;

class CSS extends Template
{
    public $stylesheets = array(
        'reset.css',
        'common.css',
        'app/common.css',
        'app/cart.css',
        'app/categories.css',
        'app/products.css'
    );
}
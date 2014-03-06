<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page;

use \Core\Core;
use \RTK\Template;

class JavaScript extends Template
{
    public $scripts = array(
        'app/scripts/debug.js',
        'app/scripts/numbers.js',
        'app/scripts/attributes.js',
        'app/scripts/objects.js',
        'app/scripts/functions.js',
        'app/scripts/strings.js',
        'app/scripts/elements.js',
        'app/scripts/events.js',
        'app/scripts/arrays.js',
        'app/scripts/selectors.js',
        'app/scripts/datasets.js',
        '3rdparty/big.js',
        'app/scripts/decimal.js',
        'app/scripts/common.js',
        'app/scripts/products.js',
        'app/scripts/dom.js',
        'app/scripts/document.js',
        'app/scripts/request.js',
        'app/scripts/request.PostForm.js',
        'app/scripts/request.PostXML.js',
        'app/scripts/scrolling.js'
    );

    protected function Init()
    {
        if( Core::$debug )
        {
            $this->scripts[] = 'app/scripts/tests/arrays.js';
            $this->scripts[] = 'app/scripts/tests/numbers.js';
            $this->scripts[] = 'app/scripts/tests/attributes.js';
            $this->scripts[] = 'app/scripts/tests/events.js';
            $this->scripts[] = 'app/scripts/tests/functions.js';
            $this->scripts[] = 'app/scripts/tests/strings.js';
            $this->scripts[] = 'app/scripts/tests/objects.js';
            $this->scripts[] = 'app/scripts/tests/selectors.js';
            $this->scripts[] = 'app/scripts/tests/dom.js';
            $this->scripts[] = 'app/scripts/tests/document.js';
            $this->scripts[] = 'app/scripts/tests/storage.js';
            // FIXME: implement these
            /*$this->scripts[] = 'app/scripts/tests/products.js';*/
        }
    }
}
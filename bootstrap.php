<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

use \Core\Core;

Core::AddNamespace( 'RTK', __DIR__ .'/classes' );
Core::AddNamespaceTests( 'RTK', __DIR__ .'/tests', true );
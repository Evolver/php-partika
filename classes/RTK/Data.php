<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

abstract class Data
{
    /**
     * @var Application
     */
    public $app;

    /**
     * Constructor.
     *
     * @param Application $app
     */
    public function __construct( $app )
    {
        $this->app = $app;
    }
}
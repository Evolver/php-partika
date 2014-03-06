<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Core\Core;

abstract class View
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

    /**
     * Returns content in $format.
     *
     * @param string $format
     *
     * @return mixed
     */
    public function GetContent( $format )
    {
        $methodName = 'Get' . $format;

        if( !method_exists( $this, $methodName ) )
        {
            Core::Fail( 'Unsupported format ' . $format );
        }

        return $this->{ $methodName }();
    }
}
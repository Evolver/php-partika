<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \ArrayAccess;
use \Core\Core;
use \App\Template\File as BaseTemplate;

abstract class Template extends BaseTemplate
                        implements ArrayAccess
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var string
     */
    protected $name;

    /**
     * Constructor.
     *
     * @param Application $app
     *
     * @param string $name
     *     Absolute template name.
     */
    public function __construct( $app, $name )
    {
        $this->app = $app;
        $this->name = $name;

        parent::__construct( $this->app->cfg->templateRoot . '/' . $this->name . '.phtml' );

        if( method_exists( $this, 'Init' ) )
        {
            $this->Init();
        }
    }

    /**
     * Inserts (writes) content corresponding to $areaName.
     *
     * Content variable lookup order:
     *     1) Property with name $areaName;
     *     2) Method with name "GetDefault$areaName";
     *     3) Child templte with name $areaName.
     *
     * If content variable === false or null, method does nothing.
     * If content variable is string, inserts that string.
     * If content variable is callable, it is invoked and given $args.
     * In all other cases throws exception.
     *
     * @param string $areaName
     *
     * @param mixed $args...
     */
    protected function Insert( $areaName )
    {
        $args = func_get_args();
        Core::Assert( $areaName === array_shift( $args ) );

        $handler = $this->{ $areaName };

        if( $handler === false || $handler === null )
        {
            // No-op
        }
        else if( is_string( $handler ) )
        {
            echo $handler;
        }
        else if( is_callable( $handler ) )
        {
            call_user_func_array( $handler, $args );
        }
        else
        {
            Core::Fail( 'Unsupported handler type ' .gettype( $handler ) );
        }
    }

    /**
     * Kicks off parsing of this template.
     * Any arguments given are ignored.
     */
    public function __invoke()
    {
        $this->Parse( array(
            'app' => $this->app
        ));
    }

    /**
     * Returns currently configured content variable for area $areaName.
     *
     * @param string $areaName
     *
     * @return mixed
     *
     * @see Template::Insert()
     */
    public function __get( $areaName )
    {
        if( method_exists( $this, $handlerName = 'GetDefault' . $areaName ) )
        {
            $handler = $this->{ $handlerName }();
        }
        else
        {
            $handler = $this[ $areaName ];
        }

        $this->{ $areaName } = $handler;

        return $handler;
    }

    /**
     * Returns new instance of a child template.
     *
     * @param string $path
     *     Path to child template.
     */
    public function offsetGet( $path )
    {
        return $this->app->Template( $this->name . '/' . $path );
    }

    /**
     * Not in use.
     */
    public function offsetSet( $name, $value )
    {
        Core::Fail( 'Not supported' );
    }

    /**
     * Not in use.
     */
    public function offsetExists( $name )
    {
        Core::Fail( 'Not supported' );
    }

    /**
     * Not in use.
     */
    public function offsetUnset( $name )
    {
        Core::Fail( 'Not supported' );
    }
}
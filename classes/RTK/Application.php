<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Exception;
use \Core\Core;
use \Core\String;
use \Web\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * @var Config
     */
    public $cfg;

    /**
     * @var Request
     */
    public $activeRequest;

    /**
     * @var Response
     */
    public $activeResponse;

    /**
     * @var Database
     */
    public $db;

    /**
     * Constructor.
     *
     * @param Config $cfg
     */
    public function __construct( $cfg )
    {
        Core::Assert( $cfg instanceof Config );

        parent::__construct( $cfg );

        if( $cfg->templateRoot === null )
        {
            $cfg->templateRoot = $cfg->systemRoot . '/templates';
        }

        $this->db = new Database( $this );
    }

    /**
     * Creates new Template instance.
     *
     * @param string $name
     *
     * @param mixed $className
     *     Relative template class to use for template initialization.
     *     If null, $name is used as class name.
     *
     * @return Template
     */
    public function Template( $name, $className = null )
    {
        if( $className === null )
        {
            $className = Core::PathToName( $name );
        }
        else
        {
            $className = Core::PathToName( $className );
        }

        $className = __NAMESPACE__ . '\\Template\\' . $className;

        return new $className( $this, $name );
    }

    /**
     * Creates new View instance.
     *
     * @param string $name
     *
     * @return View
     */
    public function View( $name )
    {
        $className = Core::PathToName( $name, __NAMESPACE__ . '\\View\\' );

        return new $className( $this );
    }

    /**
     * Creates new Data instance.
     *
     * @param string $name
     *
     * @return Data
     */
    public function Data( $name )
    {
        $className = Core::PathToName( $name, __NAMESPACE__ . '\\Data\\' );

        return new $className( $this );
    }

    /**
     * Returns new Request object.
     *
     * @param mixed $name
     *     If null, default controller will be used.
     *     If string, controller that corresponds to $name
     *     will be used.
     *
     * @return string
     */
    public function GetRequest( $name )
    {
        if( $name === null )
        {
            $name = $this->cfg->defaultRequest;
        }

        $className = Core::PathToName( $name, __NAMESPACE__ . '\\Request\\'  );

        if( !class_exists( $className ) )
        {
            Core::Fail( 'Unsupported request name ' . $name );
        }

        return new $className( $this );
    }

    /**
     * Returns new Response object.
     *
     * @param mixed $format
     *     If null, default format name will be used.
     *     If string, response that corresponds to $format
     *     will be used.
     *
     * @return string
     */
    public function GetResponse( $format )
    {
        if( $format === null )
        {
            $format = $this->cfg->defaultFormat;
        }

        $responseClass = __NAMESPACE__ . '\\Response\\' . String::UpperCase( $format );

        if( !class_exists( $responseClass ) )
        {
            Core::Fail( 'Unsupported format ' . $format );
        }

        return new $responseClass( $format );
    }

    /**
     * Returns public URI of the default (index) request.
     *
     * @return string
     */
    public function GetDefaultURI()
    {
        return $this->GetURI( null );
    }

    /**
     * Returns public URI of the request identified by $name.
     *
     * @param mixed $name
     *     If null, base URI will be used.
     *     If not null, resource URI will be used.
     *
     * @param array $args
     *
     * @param mixed $string
     *     If null, tries to reuse format name of the active request. If no active request exists,
     *     uses default format specified in the configuration.
     *     If string, used as specified.
     *
     * @return string
     */
    public function GetURI( $name, $args = array(), $format = null )
    {
        if( $name === null )
        {
            $name = $this->cfg->defaultRequest;
        }

        if( $format === null )
        {
            $format = $this->GetCurrentFormat();
        }

        return $this->GetResourceURI( '/' . $name . '.' . $format, $args );
    }

    /**
     * Returns current format.
     *
     * @return string
     */
    protected function GetCurrentFormat()
    {
        if( $this->activeResponse )
        {
            return $this->activeResponse->format;
        }

        return $this->cfg->defaultFormat;
    }

    /**
     * Returns new session object.
     *
     * @return Session
     */
    protected function Session( $access = READ )
    {
        return new Session( $access );
    }

    /**
     * Processes request and sends response.
     *
     * @param mixed $request
     *
     * @param mixed $format
     */
    public function Process( $request, $format )
    {
        Core::Assert( $this->activeRequest === null );

        $defaultFormat = $this->cfg->defaultFormat;
        $notFound = $this->cfg->notFoundRequest;

        try
        {
            $resp = $this->GetResponse( $format );
        }
        catch( Exception $e )
        {
            $resp = $this->GetResponse( $defaultFormat );
        }

        try
        {
            $req = $this->GetRequest( $request );
        }
        catch( Exception $e)
        {
            $req = $this->GetRequest( $notFound );
        }

        $this->activeRequest = $req;
        $this->activeResponse = $resp;

        try
        {
            $req->resp = $resp;
            $req->Process();

            $resp->Send();
        }
        finally
        {
            $this->activeRequest = null;
            $this->activeResponse = null;
        }
    }
}
<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Core\Core;

abstract class Request
{
    /**
     * @var Application
     */
    public $app;

    /**
     * @var string
     */
    public $method;

    /**
     * @var array
     */
    public $args;

    /**
     * @var Session
     */
    public $session;

    /**
     * @var Response
     */
    public $resp;

    /**
     * Constructor.
     *
     * @param Application $app
     */
    public function __construct( $app )
    {
        $this->app = $app;
        $this->session = $app->cfg->session;
        $this->method = $app->cfg->method;
        $this->args = $app->cfg->args;
    }

    /**
     * Handles request.
     *
     * Expects $resp property to be initialized by the time of the call.
     *
     * Examine $resp to obtain processing result.
     */
    public function Process()
    {
        Core::Assert( $this->resp !== null );

        $this->resp->content = $this->GetResponse();
    }

    /**
     * Handles request and returns response.
     *
     * @return
     *     View - a view to render.
     *     Template - a template to render.
     *     Closure - a function to call to render the output.
     *     string - a string to use as output.
     */
    public abstract function GetResponse();

    /**
     * Returns "OK" response.
     *
     * @return mixed
     */
    protected function Success()
    {
        $this->resp->SetStatus_OK();
        return null;
    }

    /**
     * Returns "Not Found" response.
     *
     * @return mixed
     */
    protected function NotFound()
    {
        $this->resp->SetStatus_NotFound();

        $tpl = $this->app->Template( 'Page' );
        $tpl->title = 'Nepareiza saite';
        $tpl->Header = false;
        $tpl->Content = 'Jūsu pieparasītā lapa neeksistē vai arī saite (URL) tika sastādīta nepareizi.';

        return $tpl;
    }

    /**
     * Returns "Forbidden" (Access denied) response.
     *
     * @return mixed
     */
    protected function Forbidden()
    {
        $this->resp->SetStatus_Forbidden();

        $tpl = $this->app->Template( 'Page' );
        $tpl->title = 'Pieeja liegta';
        $tpl->Header = false;
        $tpl->Content = 'Pieeja šim resursam ir liegta.';
        return $tpl;
    }

    /**
     * Returns "Internal Server Error" response.
     *
     * @return mixed
     */
    protected function Error()
    {
        $this->resp->SetStatus_Error();

        $tpl = $this->app->Template( 'Page' );
        $tpl->title = 'Iekšējā servera kļūme';
        $tpl->Header = false;
        $tpl->Content = 'Nav iespējams apstrādāt Jūsu pieprasījumu. Lūdzu, mēģiniet vēlreiz vēlāk.';
        return $tpl;
    }
}
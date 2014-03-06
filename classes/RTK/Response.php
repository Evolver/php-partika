<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Core\Core;
use \Core\MIME;
use \Core\HTTP\Header\Response as Header;

class Response
{
    /**
     * HTTP response status.
     *
     * @var int
     */
    public $status;

    /**
     * HTTP response status string.
     *
     * @var string
     */
    public $statusString;

    /**
     * Response content.
     *
     * @var mixed
     *     If instance of Template given, the template will be
     *     parsed and sent as an output.
     *     If null, no content will be sent.
     */
    public $content;

    /**
     * Response MIME type.
     *
     * Leave null if no MIME type information shall be sent.
     *
     * @var mixed
     */
    public $mimeType;

    /**
     * Response character set.
     *
     * Leave null if no character set information shall be sent.
     *
     * @var mixed
     */
    public $charset;

    /**
     * Response format name.
     *
     * Leave null if no specific format is associated.
     *
     * @var string
     */
    public $format;

    /**
     * Name of the response content.
     * Usually is a file name.
     *
     * Leave null if no content name shall be sent.
     *
     * @var mixed
     */
    public $name;

    /**
     * Constructor.
     *
     * @param string $format
     */
    public function __construct( $format = null )
    {
        $this->format = $format;

        // Initially assume OK status
        $this->SetStatus_OK();
    }

    /**
     * Sets HTTP response status.
     *
     * @param int $code
     *
     * @param string $string
     */
    protected function SetStatus( $code, $string )
    {
        $this->status = $code;
        $this->statusString = $string;
    }

    /**
     * Sets response status to "OK".
     */
    public function SetStatus_OK()
    {
        $this->SetStatus( 200, 'OK' );
    }

    /**
     * Sets response status to "Not Found".
     */
    public function SetStatus_NotFound()
    {
        $this->SetStatus( 404, 'Not Found' );
    }

    /**
     * Sets response status to "Forbidden" (Access denied).
     */
    public function SetStatus_Forbidden()
    {
        $this->SetStatus( 403, 'Forbidden' );
    }

    /**
     * Sets response status to "Error".
     */
    public function SetStatus_Error()
    {
        $this->SetStatus( 500, 'Internal Server Error' );
    }

    /**
     * Sends response.
     */
    public function Send()
    {
        Core::Assert( $this->status !== null );
        Core::Assert( $this->statusString !== null );

        Header::Status( $this->status, $this->statusString );

        if( $this->mimeType !== null )
        {
            Header::ContentType( $this->mimeType, $this->charset );
        }

        if( $this->name !== null )
        {
            Header::ContentDisposition( Header::DISPOSITION_INLINE, $this->name );
        }

        // Try sending headers right away
        flush();

        $this->SendContent( $this->content );
    }

    /**
     * Sends content.
     *
     * @param mixed $content
     */
    protected function SendContent( $content )
    {
        if( $content === null )
        {
            return;
        }

        if( is_string( $content ) )
        {
            echo $content;
        }
        else if( is_callable( $content ) )
        {
            $content();
        }
        else if( $content instanceof Template )
        {
            $content();
        }
        else if( $content instanceof View )
        {
            $this->SendContent( $this->GetViewContent( $content ) );
        }
        else
        {
            Core::Fail( 'Unsupported content type ' . gettype( $content ) );
        }
    }

    /**
     * Returns content that corresponds to $view.
     *
     * Child classes shall override this method to implement view rendering.
     *
     * @param View $view
     *
     * @return mixed
     */
    protected function GetViewContent( $view )
    {
        Core::Fail( 'Not supported' );
    }
}
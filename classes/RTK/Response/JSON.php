<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Response;

use \Core\MIME;
use \RTK\Response;

class JSON extends Response
{
    /**
     * @see Response::__construct()
     */
    public function __construct( $format )
    {
        parent::__construct( $format );

        $this->mimeType = MIME::JSON;
        $this->charset = 'UTF-8';
    }

    /**
     * @see Response::GetViewContent()
     */
    protected function GetViewContent( $view )
    {
        return $view->GetContent( 'JSON' );
    }
}
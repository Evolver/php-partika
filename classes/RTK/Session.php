<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Core\Access;
use \App\Session as BaseSession;
use \RTK\Session\Data as SessionData;

class Session extends BaseSession
{
    /**
     * @copydoc BaseSession::Open()
     *
     * @return SessionData
     */
    public function Open( $access = Access::READ )
    {
        return new SessionData( $access );
    }
}
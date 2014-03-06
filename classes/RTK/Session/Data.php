<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Session;

use \Core\Core;
use \Core\Access;
use \App\Session\Data as BaseData;

class Data extends BaseData
{
    public function __construct( $access = Access::READ )
    {
        Core::Assert( session_start() );
    }

    public function __destruct()
    {
        session_write_close();
    }

    public function offsetExists( $key )
    {
        return array_key_exists( $key, $_SESSION );
    }

    public function offsetGet( $key )
    {
        return $_SESSION[ $key ];
    }

    public function offsetSet( $key, $value )
    {
        $_SESSION[ $key ] = $value;
    }

    public function offsetUnset( $key )
    {
        unset( $_SESSION[ $key ] );
    }

    public function GetId()
    {
        return session_id();
    }
}
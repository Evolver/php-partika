<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

class Currency
{
    /**
     * Formats number according to latvian (LVL) currency format.
     *
     * @param real $amount
     *
     * @return string
     */
    public static function Format( $amount )
    {
        if( $amount == floor( $amount ) )
        {
            return $amount . ',-';
        }

        return number_format( $amount, 2, ',', ' ' );
    }
}
<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Data;

use \RTK\Data;

class Order extends Data
{
    public $code;

    public $shippingAddress;

    public $shippingDate;

    public $contactPhone;
}
<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Data;

use \RTK\Data;

class Product extends Data
{
    public $id;

    public $name;

    public $unitType = 'Quantity';

    public $unitAmount = '1';

    public $unitPrice = '0';

    public $minUnits = 1;

    public $maxUnits = 10;

    public function GetPrice( $unitCount )
    {
        return bcmul( $this->unitPrice, $unitCount, 2 );
    }
}
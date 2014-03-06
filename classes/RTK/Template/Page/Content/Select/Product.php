<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Content\Select;

use \Core\Input;
use \RTK\Template;

class Product extends Template
{
    public $id;

    public $name = 'Unnamed';

    public $unitType = 'Quantity';

    public $unitAmount = 1;

    public $unitPrice = 0;

    public $unitCount = 0;

    public $minUnits = 1;

    public $maxUnits;
}
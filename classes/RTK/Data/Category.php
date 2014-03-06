<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Data;

use \Core\Core;
use \RTK\Data;

class Category extends Data
{
    public $id;

    public $name;

    public function GetProducts()
    {
        $catList = & $this->app->cfg->categories;

        Core::Assert( array_key_exists( $this->id, $catList ) );
        $info = $catList[ $this->id ];

        foreach( $info[ 'products' ] as $prodId )
        {
            yield $prodId => $this->app->db->GetProduct( $prodId );
        }
    }
}
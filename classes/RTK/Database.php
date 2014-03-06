<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK;

use \Core\Core;
use \RTK\Data\Category;
use \RTK\Data\Product;

class Database
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * Constructor.
     *
     * @param Application $app
     */
    public function __construct( $app )
    {
        $this->app = $app;
    }

    /**
     * Returns list of all categories.
     *
     * @return Iterator
     */
    public function GetCategories()
    {
        foreach( $this->app->cfg->categories as $id => $info )
        {
            $cat = new Category( $this->app );
            $cat->id = $id;
            $cat->name = $info[ 'name' ];

            yield $id => $cat;
        }
    }

    /**
     * Looks up a product by product ID.
     *
     * @param string $id
     *
     * @return Product
     */
    public function GetProduct( $id )
    {
        $prodList = & $this->app->cfg->products;

        Core::Assert( array_key_exists( $id, $prodList ) );
        $info = $prodList[ $id ];

        $prod = new Product( $this->app );
        $prod->id = $id;
        $prod->name = $info[ 'name' ];
        $prod->unitType = $info[ 'unitType' ];
        $prod->unitAmount = $info[ 'unitAmount' ];
        $prod->unitPrice = $info[ 'unitPrice' ];
        $prod->minUnits = $info[ 'minUnits' ];
        $prod->maxUnits = $info[ 'maxUnits' ];

        return $prod;
    }
}
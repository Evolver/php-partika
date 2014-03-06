<?php
/**
 * @author Dmitry Stepanov <dmitry@stepanov.lv>
 * @copyright 2013, Dmitry Stepanov. All rights reserved.
 * @link http://stepanov.lv
 */

namespace RTK\Template\Page\Header\Cart;

use \Core\Core;
use \Core\Input;
use \RTK\Template;

class Actions extends Template
{
    public $supported = array();

    public $actions = array( 'review', 'clear' );

    protected function Init()
    {
        $this->supported = array
        (
            'review' => array
             (
                 'class' => 'proceed',
                 'href' => $this->app->GetURI( 'Review' ),
                 'title' => 'Aplūkot preces grozā un noformēt pasūtījumu',
                 'label' => 'Uz kasi'
             ),
             'checkout' => array
             (
                 'class' => 'proceed',
                 'href' => $this->app->GetURI( 'Order' ),
                 'title' => 'Noformēt pasūtījumu',
                 'label' => 'Pasūtīt'
             ),
             'clear' => array
             (
                 'class' => 'cancel',
                 'href' => 'javascript:;',
                 'title' => 'Attīrīt groza saturu',
                 'label' => 'Iztukšot'
             ),
             'return' => array
             (
                 'class' => 'return',
                 'href' => 'javascript: history.back();',
                 'title' => 'Atgriezties pie iepriekšējās darbības',
                 'label' => 'Atpakaļ'
             )
        );
    }

    protected function GetDefaultAction()
    {
        return function( $name )
        {
            Core::Assert( array_key_exists( $name, $this->supported ) );
            $action = $this->supported[ $name ];

            $tpl = $this[ 'Action' ];
            $tpl->class = $action[ 'class' ];
            $tpl->href = $action[ 'href' ];
            $tpl->title = $action[ 'title' ];
            $tpl->label = $action[ 'label' ];
            $tpl();
        };
    }
}
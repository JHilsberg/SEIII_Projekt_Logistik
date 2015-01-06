<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 02.12.14
 * Time: 15:05
 */

class Order extends Eloquent{
    public $table = 'orders';
    public $timestamps = false;

    public function abholadresse()
    {
        return $this->hasOne('Adress', 'id', 'abholadresse');
    }

    public function lieferadresse(){

        return $this->hasOne('Adress', 'id', 'lieferadresse');
    }
}
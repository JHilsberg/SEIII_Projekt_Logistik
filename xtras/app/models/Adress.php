<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 02.12.14
 * Time: 15:04
 */

class Adress extends Eloquent{
    public $table = 'addresses';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('Order', 'id', 'abholadresse');
    }
}
<?php

class Product {
    var $name = 'init name';
    var $quantity = 'init quantity';





    /** Get All Data */

    function getData(){
       return $this;
    }


    /** Getter and Setters */

    function set($key, $value) {
        $this->$key = $value;
    }

    function get($key) {
        return $this->$key;
    }
}

?>

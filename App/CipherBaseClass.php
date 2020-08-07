<?php

namespace App;

class CipherBaseClass
{
    private $key;
    private $cipherText;

    /**
     * CipherBaseClass constructor.
     * @param $key
     * @param $cipherText
     */
    public function __construct($key, $cipherText){
        $this-> key = $key;
        $this-> cipherText = $cipherText;
    }
    public function encrypt($cipherText, $key) {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }
    public function decrypt($cipherText, $key) {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }
}

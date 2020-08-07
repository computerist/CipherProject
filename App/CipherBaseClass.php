<?php

declare(strict_types=1);

namespace App;

class CipherBaseClass
{
    protected $cipherText;

    /**
     * CipherBaseClass constructor.
     * @param $cipherText
     */
    public function __construct($cipherText){

        $this->cipherText = $cipherText;
    }

    public function encrypt() {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }

    public function decrypt() {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }
}
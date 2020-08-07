<?php

namespace App;

class CipherBaseClass
{
    private $key;
    private $inputText;
    private $cipherText;

    public function encrypt($inputText, $key) {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }

    public function decrypt($cipherText, $key) {
        /* this doesn't actually do anything */
        // maybe throw an error?
    }
}
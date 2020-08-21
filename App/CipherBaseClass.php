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

}
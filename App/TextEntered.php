<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\Constraint\IsTrue;

class TextEntered
{
    private $inputText;
    private $inputKey;
   private $cipherType;
   private const constantCipherType=['C', 'D'];


    public function __construct($inputText, $inputKey, $cipherType)
    {
        $this->inputText =  $inputText;
        $this->inputKey = $inputKey;
        $this->cipherType = $cipherType;
    }

    /**
     * @return string[]
     */
    public function explodeArrayWrapper()
    {
        $newArray = explode(" ", $this->inputText);
        return $newArray;
    }

    public function putArrayIntoString($inputArray)
    {
        return implode(" ", $inputArray);
    }

    public function extractEncrptionKey($inputArray){
        $CipherKeyEntered =  $this->cipherType;
        if (in_array($CipherKeyEntered, self::constantCipherType)){
            return $CipherKeyEntered;
        }
        else {return null;}
    }
}

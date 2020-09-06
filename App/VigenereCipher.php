<?php

declare(strict_types=1);

namespace App;

include_once "./App/CipherBaseClass.php";

class VigenereCipher extends CipherBaseClass implements CipherInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * CeasarCipher constructor.
     * @param string $cipherText
     * @param string $key
     */

    public function __construct(string $cipherText, string $key)
    {
        parent::__construct($cipherText);
        $this->key = $key;
    }
    private function makeKeyStream(): string {
        $outputKeyStream = '';
        $inputKeyLen = strlen($this->key);
        $inputArray = str_split($this->cipherText);
        $inputTextLen = strlen($this->cipherText);
        $inputKey = str_split($this->key);

        $keyIndex = -1 ;

        for ($index = 0; $index <= $inputTextLen -1; ++$index ) {
            $keyIndex ++;
            if ($keyIndex >= $inputKeyLen) {
                 $keyIndex = 0;
            }
            if (!ctype_alpha($inputArray[$index])) {
                if (!ctype_space($inputArray[$index])) {
                    $keyStream = $inputArray[$index]; /// not a char or a space a number, a punct
                }
                else {
                    $keyIndex = $keyIndex -1;
                }
            } else {
                $keyStream = $inputKey[$keyIndex];
           }

            $outputKeyStream .= $keyStream;
        }
        return $outputKeyStream;
    }

    private function shiftCharacters($keyStream ): string
    {
        $inputArray = str_split($this->cipherText);
        $inputTextLen = strlen($this->cipherText);
        $outputText = '';
        $keyStreamIndex = -1;
        for ($index = 0; $index <= $inputTextLen -1; ++$index) {
            $keyStreamIndex = $keyStreamIndex + 1;
            if (!ctype_alpha($inputArray[$index])) {
                if (!ctype_space($inputArray[$index])) {
                    $cipheredChar1 = ord($inputArray[$index]);
                }
            } else {
                $offsetValue = ord(ctype_upper($inputArray[$index]) ? 'A' : 'a');
                $cipheredChar1 = ((ord(strtoupper($inputArray[$index])) + ord(strtoupper($keyStream[$keyStreamIndex])) - $offsetValue));
                if ($cipheredChar1 > ($offsetValue + 26)) {
                    $cipheredChar1 = ($cipheredChar1 % (26 + $offsetValue)) + $offsetValue;
                }
            }
            if (!ctype_space($inputArray[$index])) {
                $outputText .= chr($cipheredChar1);
            }
            }

        return $outputText;
    }

    public function decrypt(): string
    {
//        $this->key = 26 - $this->key;
//        return $this->shiftingChars();
    }

    public function encrypt(): string
    {
        return $this->shiftCharacters($this->makeKeyStream());

    }
    public function encryptMakeKeyStream(): string
    {
        return  $this->makeKeyStream();
    }
}

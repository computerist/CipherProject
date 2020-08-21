<?php

declare(strict_types=1);

namespace App;

include_once "./App/CipherBaseClass.php";

class CeasarCipher extends CipherBaseClass
{
    /**
     * @var int
     */
    private $key;

    /**
     * CeasarCipher constructor.
     * @param string $cipherText
     * @param int $key
     */

    public function __construct(string $cipherText,int $key)
    {
        parent::__construct($cipherText);
        $this->key = $key;
    }

    public function shiftingCharsForward()
    {
        $outputText = '';
        $inputArray = str_split($this->cipherText);
        foreach ($inputArray as $inputChar) {
            if (!ctype_alpha($inputChar)) {
                $cipheredChar = $inputChar;
            } else {
                $offsetValue = ord(ctype_upper($inputChar) ? 'A' : 'a');
                $cipheredChar= chr(((( ord($inputChar) + $this->key) - $offsetValue)% 26)+ $offsetValue);
           }
            $outputText .= $cipheredChar;
        }
        return $outputText;
    }

    public function decrypt()
    {
        $this->key = 26 - $this->key;
        return $this->shiftingCharsForward();
    }

    public function encrypt()
    {
        return $this->shiftingCharsForward();

    }
}

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

    public function __construct(string $cipherText,int $key)
    {
        parent::__construct($cipherText);
        $this->key = $key;
    }

    public function moveCharactersForward()
    {
        $outputText = "";
        $inputArray = str_split($this->cipherText);
        foreach ($inputArray as $inputChar) {
            if (!ctype_alpha($inputChar)) {
                $cipheredChar = $inputChar;
            } else {
                $offsetValue = ord(ctype_upper($inputChar) ? 'A' : 'a');
                $ciperAsciiValue = ord($inputChar) + $this->key;
                $ciperAsciiValue = $ciperAsciiValue - $offsetValue;
                $ciperAsciiValue = $ciperAsciiValue % 26;
                $ciperAsciiValue = $ciperAsciiValue + $offsetValue;
                $cipheredChar = chr($ciperAsciiValue);
            }
            $outputText .= $cipheredChar;
        }
        return $outputText;
    }

    public function decrypt()
    {
        $this->key = 26 - $this->key;
        return $this->moveCharactersForward();
    }

    public function encrypt()
    {
        return $this->moveCharactersForward();

    }
}

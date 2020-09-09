<?php

declare(strict_types=1);

namespace App;

class CeasarCipher extends CipherBaseClass implements CipherInterface
{
    /**
     * @var int
     */
    private $key;

    /**
     * CeasarCipher constructor.
     * @param int $key
     */

    public function __construct(int $key)
    {
        $this->key = $key;
    }

    private function shiftingChars(int $shiftBy, string $theText): string
    {
        $outputText = '';
        $inputArray = str_split($theText);
        foreach ($inputArray as $inputChar) {
            if (!ctype_alpha($inputChar)) {
                $cipheredChar = $inputChar;
            } else {
                $offsetValue  = ord(ctype_upper($inputChar) ? 'A' : 'a');
                $cipheredChar = chr((((ord($inputChar) + $shiftBy) - $offsetValue) % 26) + $offsetValue);
            }
            $outputText .= $cipheredChar;
        }
        return $outputText;
    }

    public function decrypt(string $cipherText): string
    {
        return $this->shiftingChars(26 - $this->key, $cipherText);
    }

    public function encrypt(string $plainText): string
    {
        return $this->shiftingChars($this->key, $plainText);
    }
}

<?php

declare(strict_types=1);

namespace App;

include_once "./App/CipherBaseClass.php";

class VigenereCipher extends CipherBaseClass
{

    public function encrypt($inputText, $key)
    {
        $newKey = 26 - $key;
        return $outputText = $this->decrypt($inputText, $newKey);
    }

    public function decrypt($cipherText, $key)
    {
        $outputText = "";
        $inputArray = str_split($cipherText);
        foreach ($inputArray as $inputChar) {
            if (!ctype_alpha($inputChar)) {
                $cipheredChar = $inputChar;
            } else {
                $offsetValue = ord(ctype_upper($inputChar) ? 'A' : 'a');
                $ciperAsciiValue = ord($inputChar) + $key;
                $ciperAsciiValue = $ciperAsciiValue - $offsetValue;
                $ciperAsciiValue = $ciperAsciiValue % 26;
                $ciperAsciiValue = $ciperAsciiValue + $offsetValue;
                $cipheredChar = chr($ciperAsciiValue);
            }
            $outputText .= $cipheredChar;
        }
        return $outputText;
    }


}

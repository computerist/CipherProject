<?php

declare(strict_types=1);

namespace App;

require 'vendor/autoload.php';


do {
    $cipherType = strtoupper(readline("C = Ceaser      V = Vigenere    : "));
    if ($cipherType <> 'C' and $cipherType <> 'V') {
        exit("ERROR: Incorrect cipher type has been entered" . PHP_EOL);
    }

    $inputText = readline("Text to cipher                  : ");
    if (empty($inputText) or (strlen($inputText) > 0 && strlen(trim($inputText)) == 0)) {
        exit("ERROR: Nothing has been entered" . PHP_EOL);
    }

    $cipherMethod = strtoupper(readline("Method E Encrypt or D Decrypt   : "));
    if ($cipherMethod <> 'E' and $cipherMethod <> 'D') {
        exit("ERROR: Incorrect method has been entered" . PHP_EOL);
    }
    if ($cipherMethod == 'V'){
        $cipherKey = int(readline("Cipher shift key number (>0)    : "));
        if ($cipherKey < 1) {
            exit("ERROR : Cipher key entered is less than 1 !!" . PHP_EOL);
        }
    }
    else {
        $cipherKey = readline("Cipher shift key number (>0)    : ");
        if ($cipherKey == "") {
            exit("ERROR : Cipher key entered empty !!" . PHP_EOL);
        }
    }
    $newclass = new CeasarCipher((int)$cipherKey);    // be default
    if ($cipherType === 'V') {
        $newclass = new VigenereCipher($inputText, $cipherKey);
    }
    if ($cipherMethod === 'D') {
        $results = $newclass->decrypt($inputText);
    } else {
        $results = $newclass->encrypt($inputText);
    }
    echo "Original Text entered          => $inputText \n";
    echo "Ciphered Text                  => $results \n";

    $continue = strtoupper(readline("Do you want to cipher any more? (Y/N)"));

} while ($continue == 'Y');

echo "Goodbye \n";

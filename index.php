<?php

declare(strict_types=1);

namespace App;
require 'vendor/autoload.php';

include_once "./App/Cipher.php";
do {
    $inputText = readline("Text to cipher                  : ");
    if (empty($inputText) or (strlen($inputText) > 0 && strlen(trim($inputText)) == 0)) {
        exit("ERROR: Nothing has been entered".PHP_EOL);
    }

    $cipherMethod =  strtoupper(readline("Method E Encrypt or D Decrypt   : "));
    if ($cipherMethod <> 'E' and $cipherMethod <> 'D' ) {
        exit("ERROR: Incorrect method has been entered".PHP_EOL);
    }

    $cipherKey = (int)readline("Cipher shift key number (>0)    : ");
    if ($cipherKey <1) {
        exit("ERROR : Cipher key entered is less than 1 !!".PHP_EOL);
    }

    $cipheredResult = new \App\Cipher();
    $results = $cipheredResult ->CiperText($inputText,$cipherKey,$cipherMethod);
 //   $results = $cipheredResult->encrypt($inputText, $cipherKey);
    echo "Original Text entered          => $inputText \n";
    echo "Ciphered Text                  => $results \n";

    $continue = strtoupper(readline("Do you want to cipher any more? (Y/N)"));

} while ($continue == 'Y');
echo "Goodbye \n";
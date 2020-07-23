<?php

declare(strict_types=1);

namespace App;
require 'vendor/autoload.php';


$inputText = "Mello 12ze9ze3"; //key=2, new string=Lgnnq 12bgbg3

$key =2;
$cipherMethod = 'C';
$textEntered = new TextEntered($inputText, $key,$cipherMethod);
$newArray = $textEntered->explodeArrayWrapper();
$cipherKey = $textEntered->extractEncrptionKey($newArray);

$finalstring = new Cipher;
$printlstring =$finalstring->cipherArray($newArray, $key);
echo "OLD SENTENCE =".$inputText."<<NEW SENTENCE=".$printlstring;

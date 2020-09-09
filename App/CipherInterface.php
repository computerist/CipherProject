<?php


namespace App;


interface CipherInterface
{

    public function encrypt(string $plainText);

    public function decrypt(string $cipherText);
}
<?php

use PHPUnit\Framework\TestCase;

use App\Cipher;
/**
 * This module holds the unit tests that were carried out to ensure that the Caesar cipher works correctly.
 * Each test requires the user to enter in the actual text to cipher, the key (the number of places each
 * character needs to move) and the method of ciphering (Encryption  or Decryption).
 * All characters that are not alphabetical are kept the same
 *
 */
class VigenereTest extends TestCase
{
    private $sut;
    /**
     * Test : to move all characters in one word forward at a time.
     * Am NOT testing looping around Z with this test
     *
     */
    public function testMakeKeyStream():void {
        $userText = "ATTACKATDAWN";
        $userKeys = "LEMON";
        $expectedResult = "LEMONLEMONLE";
        $this->sut = new \App\VigenereCipher($userText, $userKeys);
        $this ->assertSame($expectedResult, $this->sut->encryptMakeKeyStream());
   }
    /**
     * Test : to move all words in a sentence forward.
     * Am NOT testing looping around Z with this test
     *
     */
    public function testWordIsEncrptedWithKey()
    {
        $userText       = "ATTACKATDAWN";
        $userKeys       = "LEMON";
        $expectedResult = "LXFOPVEFRNHR";
        $this->sut      = new \App\VigenereCipher($userText, $userKeys);
        $this->assertSame($expectedResult, $this->sut->encrypt());
    }

    public function testSentenceWithSopaces()
    {
        $userText       = "MAKE IT WORK";
        $userKeys       = "MATH";
       $expectedResult = "YADLUTPVDK";
        $this->sut      = new \App\VigenereCipher($userText, $userKeys);
        $this->assertSame($expectedResult, $this->sut->encrypt());
    }
}
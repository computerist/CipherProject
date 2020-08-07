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
class CipherTest extends TestCase
{
    private $sut;


    /**
     * A module that is called at the beginning of every test
     *
     */
//    public function setUp():void
//    {
//        $key = 2;
//        $this->sut = new \App\CeasarCipher($key);
//    }
    /**
     * Test : to move all characters in one word forward at a time.
     * Am NOT testing looping around Z with this test
     *
     */
    public function testOneWordMovesCorrectNumberForward():void {
        $userText = "Hell8o";
        $expectedResult = 'Jgnn8q';
        $userKeys = 2;
        $cipherType = 'E';  //Encrypt
        $this->sut = new \App\CeasarCipher($userText, $userKeys);
        $this ->assertSame($expectedResult, $this->sut->encrypt());
   }
    public function testOneWordMovesCorrectNumberBackwards(){
        $userText = 'Jgnnq ';
        $expectedResult = 'Hello ';
        $userKeys = 2;
        $cipherType = 'D';   //Decrypt
        $this->sut = new \App\CeasarCipher($userText, $userKeys);
        $this -> assertSame($expectedResult, $this->sut->decrypt());
    }
//    /**
//     * Test : to move all words in a sentence forward.
//     * Am NOT testing looping around Z with this test
//     *
//     */
//    public function testASentenceMovesForward(){
//        $userText ='Hello Boo. Thats right!';
//        $expectedResult = 'Jgnnq Dqq. Vjcvu tkijv!';
//        $userKeys = 2;
//        $cipherType = 'E';   //Encrypt
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to move all characters in a word forward, looping around the letter Z.
//     * For example if the input was 'Z' and the key was 2 then the loop would go from Z, A, to B
//     *
//     */
//    public function testWordMovesAroundZ(){
//        $userText = 'Xyz';
//        $expectedResult = 'Zab';
//        $userKeys = 2;
//        $cipherType = 'E';   //Encrypt
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to move all words in a sentence forward, loop around the letter Z
//     * For example if the input was 'Zip' and the key was 2 then the loop would go
//     * from Z, A, to B
//     * from i ,j to k
//     * from p , q to r
//     * so the final output should be Bkr
//     *
//     */
//    public function testSentenceMovesForwardAroundZ(){
//        $userText ='Hello you.  Yes You Mr Zorby!';
//        $expectedResult = 'Jgnnq aqw.  Agu Aqw Ot Bqtda!';
//        $cipherType = 'E';   //c
//        $userKeys = 2;
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to move all characters in one word backward at a time.
//     * Am NOT testing looping around A with this test
//     *
//     */

//    /**
//     * Test : to move all characters in a word backward, looping around the letter A to Z.
//     * For example if the input was 'A' and the key was 2 then the loop would go from A, Z, to Y
//     *
//     */
//    public function testWordMovesCorrectNumberBackwardsAroundZ(){
//        $userText = 'c';
//        $expectedResult = 'y';
//        $userKeys = 4;
//        $cipherType = 'D';   //Decrypt
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to move all words in a sentence backward, loop around the letter A
//     * For example if the input was 'Zic Abel' and the key was 2 then the loop would go
//     * from Z, X to Y
//     * from i ,h to g
//     * from p , o to n
//     * so the final output should be Ygn
//     * and then the next word - following the same steps
//     *
//     */
//    public function testSentenceMovesCorrectNumberBackwardsAroundZ(){
//        $userText = 'Yja co K fqkpi vjku pqy Bceegta?';
//        $expectedResult = 'Why am I doing this now Zaccery?';
//        $userKeys = 2;
//        $cipherType = 'D';   //Decrypt
//
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to move all words in a sentence forward, loop around the letter A
//     * For example if the input was 'Zip Axy' and the key was 2 then the loop would go
//     * from Z, A, to B
//     * from i ,j to k
//     * from p , q to r
//     * so the final output should be Bkr
//     * and then the next word - following the same steps
//     *
//     */
//    public function testSentenceMovesCorrectNumberforwardAroundZ(){
//        $userText = 'The quick brown fox jumps over the lazy dog';
//        $expectedResult = 'Vjg swkem dtqyp hqz lworu qxgt vjg ncba fqi';
//        $userKeys = 2;
//        $cipherType = 'E';   //Encrypt
//
//        $this -> assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * @dataProvider dataProviderForCipher
//     *
//     * Test : to move all words in a sentence forward or backward depending upon what is stored in the data module
//     *
//     */
//    public function testUsingDataProviderToGiveData($userText, $expectedResult, $userKeys,$cipherType ){
//
//        $this->assertSame($expectedResult, $this->sut->CiperText($userText,$userKeys,$cipherType));
//    }
//    /**
//     * Test : to store all the data needed for the unit tests in one module
//     *
//     */
//    public function dataProviderForCipher(){
//        return [
//            "FirstText" => [$userText = 'Fubswrjudskb',
//                            $expectedResult = 'Cryptography',
//                             $userKeys = 3,
//                             $cipherType = 'D'],
//
//              "SecondText" => [ $userText = 'Hello Boo. Thats right!',
//                                $expectedResult = 'Jgnnq Dqq. Vjcvu tkijv!',
//                                $userKeys = 2,
//                                $cipherType = 'E']
//        ];
//    }
}
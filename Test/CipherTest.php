<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/** @test  */

class CipherTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testOneWordMovesCorrectNumberForward(){
      $userText ='Hell8e';
      $expectedResult ="Jgnn8g";
      $userKeys= 2;
      $cipherType = "E";
      $userInput = new \App\Cipher();
      $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }

    public function testASentenceMovesForward(){
        $userText ='Hello Boo. Thats right!';
        $expectedResult ="Jgnnq Dqq. Vjcvu tkijv!";
        $userKeys= 2;
        $cipherType = 'E';   //Decript
        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }
    public function testWordMovesAroundZ(){
        $userText ='Xyz';
        $expectedResult ="Zab";
        $userKeys= 2;
        $cipherType = 'E';   //Decript
        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }
    public function testSentenceMovesAroundZ(){
        $userText ='Hello you.  Yes You Mr Zorby!';
        $expectedResult ="Jgnnq aqw.  Agu Aqw Ot Bqtda!";
        $cipherType = 'E';   //Decript
        $userKeys= 2;
        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }

    public function testOneWordMovesCorrectNumberBackwards(){
        $userText ='Jgnnq ';
        $expectedResult ="Hello ";
        $userKeys= 2;
        $cipherType = 'D';   //Decript

        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }
    public function testWordMovesCorrectNumberBackwardsAroundZ(){
        $userText ="c";
        $expectedResult ="y";
        $userKeys= 4;
        $cipherType = 'D';   //Decript
        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }

    public function testSentenceMovesCorrectNumberBackwardsAroundZ(){
        $userText ="Yja co K fqkpi vjku pqy Bceegta?";
        $expectedResult ="Why am I doing this now Zaccery?";
        $userKeys= 2;
        $cipherType = 'D';   //Decript

        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }

    public function testSentenceMovesCorrectNumberforwardAroundZ(){
        $userText ="The quick brown fox jumps over the lazy dog";
        $expectedResult ="Vjg swkem dtqyp hqz lworu qxgt vjg ncba fqi";
        $userKeys= 2;
        $cipherType = 'E';   //Decript
        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));
    }
    public function testUserChoosingInputToDecipherText(){
        $userText ="Vjg swkem dtqyp hqz lworu qxgt vjg ncba fqi";
        $expectedResult ="The quick brown fox jumps over the lazy dog";

        $userKeys= 2;
        $cipherType = 'D';   //Decript

        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));

    }
    public function testUserChoosingInputToEncipherText(){
        $expectedResult ="Cryptography";
        $userText = "Fubswrjudskb";

        $userKeys= 3;
        $cipherType ='D';   //Encrpt

        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));

    }
    /**
     * @dataProvider dataProviderForCipher
     */
    public function testBalkar($userText, $expectedResult, $userKeys,$cipherType ){

        $userInput = new \App\Cipher();
        $this ->assertSame($expectedResult, $userInput->CiperText($userText,$userKeys,$cipherType));

    }
    public function dataProviderForCipher()
    {
        return [
            "FirstText" => [$userText = "Fubswrjudskb",
                            $expectedResult ="Cryptography",
                             $userKeys= 3,
                             $cipherType ='D'],

              "SecondText" => [ $userText ='Hello Boo. Thats right!',
                                $expectedResult ="Jgnnq Dqq. Vjcvu tkijv!",
                                $userKeys= 2,
                                $cipherType ='E']
        ];
    }
}
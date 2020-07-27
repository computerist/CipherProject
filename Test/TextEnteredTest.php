<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/** @test  */

class TextEnteredTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testUsersTextIsStoredAsAnArray(){

        $userInput =  new \App\TextEntered('Hello You2020',2,'C');

        $this->assertIsArray($userInput->explodeArrayWrapper());
    }

    public function testValueStoredInArrayIsCorrect(){
        $userInput =  new \App\TextEntered('Hello You2020',2,'C');
        $expectedResult = ['Hello','You2020'];
        $this->assertSame($expectedResult,$userInput->explodeArrayWrapper());


    }

    public function testValidEncryptionKeyIsSet(){
        $userInput =  new \App\TextEntered('Hello You2020',2,'C');

       $this->assertSame('C',$userInput->extractEncrptionKey($userInput),"Not correct ");

    }






}
<?php

require __DIR__ . "/../src/TennisGame.php";

use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{
  public function testHasWinner()
  {
    $playerOneName = 'Alice';
    $playerTwoName = 'Bob';
    $playerOneScore = 2;
    $playerTwoScore = 4;
    $expected = 'Bob wins';
    
    $tennisGame = new TennisGame($playerOneName, $playerTwoName);
    $tennisGame->setScore($playerOneScore, $playerTwoScore);
    $result = $tennisGame->getScore();
    $this->assertEquals($expected, $result);
  }
  
  public function testHasAdvantage()
  {
    $playerOneName = 'Alice';
    $playerTwoName = 'Bob';
    $playerOneScore = 4;
    $playerTwoScore = 3;
    $expected = 'Alice has advantages';
    
    $tennisGame = new TennisGame($playerOneName, $playerTwoName);
    $tennisGame->setScore($playerOneScore, $playerTwoScore);
    $result = $tennisGame->getScore();
    $this->assertEquals($expected, $result);
  }
  
  public function testDeuce()
  {
    $playerOneName = 'Alice';
    $playerTwoName = 'Bob';
    $playerOneScore = 4;
    $playerTwoScore = 4;
    $expected = 'Deuce';
    
    $tennisGame = new TennisGame($playerOneName, $playerTwoName);
    $tennisGame->setScore($playerOneScore, $playerTwoScore);
    $result = $tennisGame->getScore();
    $this->assertEquals($expected, $result);
  }
  
  public function testTranslateScore1()
  {
    $playerOneName = 'Alice';
    $playerTwoName = 'Bob';
    $playerOneScore = 1;
    $playerTwoScore = 2;
    $expected = 'Alice: 1, Bob: 2';
    
    $tennisGame = new TennisGame($playerOneName, $playerTwoName);
    $tennisGame->setScore($playerOneScore, $playerTwoScore);
    $result = $tennisGame->getScore();
    $this->assertEquals($expected, $result);
  }
  
  public function testTranslateScore2()
  {
    $playerOneName = 'Alice';
    $playerTwoName = 'Bob';
    $playerOneScore = 2;
    $playerTwoScore = 2;
    $expected = 'Thirty-All';
    
    $tennisGame = new TennisGame($playerOneName, $playerTwoName);
    $tennisGame->setScore($playerOneScore, $playerTwoScore);
    $result = $tennisGame->getScore();
    $this->assertEquals($expected, $result);
  }
}

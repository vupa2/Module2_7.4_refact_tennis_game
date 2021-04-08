<?php

class TennisGame
{
  public $score = '';
  public $playerOneName;
  public $playerTwoName;
  private $playerOneScore = 0;
  private $playerTwoScore = 0;
  
  public function __construct($playerOneName, $playerTwoName)
  {
    $this->playerOneName = $playerOneName;
    $this->playerTwoName = $playerTwoName;
  }
  
  public function setScore($playerOneScore, $playerTwoScore)
  {
    $this->playerOneScore = $playerOneScore;
    $this->playerTwoScore = $playerTwoScore;
  }
  
  private function hasWinner()
  {
    if ($this->playerOneScore >= 4 && $this->playerOneScore >= $this->playerTwoScore + 2) return true;
    if ($this->playerTwoScore >= 4 && $this->playerTwoScore >= $this->playerOneScore + 2) return true;
    return false;
  }
  
  private function hasAdvantages()
  {
    if ($this->playerOneScore >= 4 && $this->playerOneScore === $this->playerTwoScore + 1) return true;
    if ($this->playerTwoScore >= 4 && $this->playerTwoScore === $this->playerOneScore + 1) return true;
    return false;
  }
  
  private function playerHasHigherScore()
  {
    if ($this->playerOneScore > $this->playerTwoScore) {
      return $this->playerOneName;
    } else {
      return $this->playerTwoName;
    }
  }
  
  private function isDeuce()
  {
    return $this->playerOneScore >= 3 && $this->playerTwoScore === $this->playerOneScore;
  }
  
  private function translateScore()
  {
    switch ($this->playerOneScore) {
      case 0:
        return "Love";
      case 1:
        return "Fifteen";
      case 2:
        return "Thirty";
      case 3:
        return "Forty";
      default :
        return "Illegal score: $this->playerOneScore";
    }
  }
  
  public function getScore()
  {
    if ($this->hasWinner()) {
      return $this->playerHasHigherScore() . " wins";
    }
    
    if ($this->hasAdvantages()) {
      return $this->playerHasHigherScore() . " has advantages";
    }
    
    if ($this->isDeuce()) {
      return "Deuce";
    }
    
    if ($this->playerOneScore === $this->playerTwoScore) {
      return $this->translateScore() . "-All";
    }
    
    return "$this->playerOneName: $this->playerOneScore, $this->playerTwoName: $this->playerTwoScore";
  }
}

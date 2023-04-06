<?php

if(isset($test)){
  echo $test;
  echo "<br>";
  foreach($test->questions as $question) { 
    echo $question->text ."<br>";
    foreach($question->reponses as $reponse) {
      echo $reponse ."<br>";
     }
  }
}
#!/usr/bin/php
<?php
  /**
   * Roll a pair of dice.
   * User: silvae4
   * Date: 12/26/15
   * Time: 8:52 AM
   */
  $min = 1;
  $max = 6;

  $roll_again = "yes";

  while ($roll_again === "yes" or $roll_again === "y") {
    echo "Rolling the dice...\n";
    echo "The values are ...\n";
    echo rand($min, $max) . "\n";
    echo rand($min, $max) . "\n";

    echo "Would you like to roll the dice again?\n";
    $roll_again = trim(fgets(STDIN));
  }

  echo "\nThanks for playing";
?>
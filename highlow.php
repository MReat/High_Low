<?php 
if ($argc != 3) {
	echo "Invalid count of inputs.  Please re-enter Minimum and Maximum numbers (Integers)" . PHP_EOL;
	exit(0);
} else {
	echo "Valid Count of Parameters" . PHP_EOL;
}

if (is_numeric($argv[1]) && is_numeric($argv[2]))  {
	echo "Valid Numeric Entry" . PHP_EOL;
} else {
	echo "Invalid Arguments (Min and Max Numbers)" . PHP_EOL;
	exit(0);
}

if ($argv[1] >= $argv[2]) {
	echo "Minimum Number is greater than Maximum Number" . PHP_EOL;
	echo "Please re-enter: Filename Minimum-Number(as an integer) Maximum-Number(as an integer)" . PHP_EOL;
	exit(0);
}

$min = ((int) $argv[1]);
$max = ((int) $argv[2]);

function guessing_game ($min, $max) {

	$computer_choice = mt_rand ($min, $max);
	$round = 1;
	
	do {		
		fwrite(STDOUT, "Guess your number: ");
		$player_choice = fgets(STDIN);
 
		if ($player_choice == $computer_choice) {
			echo "GOOD GUESS! We have a WINNER!" . PHP_EOL;
			play_again();
		} elseif ($player_choice >= $min && $player_choice <= $max && $player_choice < $computer_choice) {
			echo "Guess a HIGHER number: " . PHP_EOL;
		} elseif ($player_choice >= $min && $player_choice <= $max && $player_choice > $computer_choice) {
			echo "Guess a LOWER number: " . PHP_EOL;
		} else {
			echo "Ending Game" . PHP_EOL;
			play_again();
		}	
		$round++; // advances next round
		echo "Round: {$round}" . PHP_EOL . PHP_EOL;

	} while ($player_choice != $computer_choice);

};

// play again function
function play_again () {
	fwrite(STDOUT, "Would you like to try again? (y/n) ");
	$player_play_again = trim(fgets(STDIN));
	
	if (strtolower($player_play_again) == "y") { 
		fwrite(STDOUT, "Enter Filename Minimum-Number Maximum-Number (spaces in between each): " . PHP_EOL);
		exit(0);
	} else {
	exit(0);
	}
}

guessing_game($min, $max);

?>
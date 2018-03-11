<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d %d %d %d %d %d %d",
    $nbFloors, // number of floors
    $width, // width of the area
    $nbRounds, // maximum number of rounds
    $exitFloor, // floor on which the exit is found
    $exitPos, // position of the exit on its floor
    $nbTotalClones, // number of generated clones
    $nbAdditionalElevators, // ignore (always zero)
    $nbElevators // number of elevators
);
$elevators = array();
for ($i = 0; $i < $nbElevators; $i++)
{
    fscanf(STDIN, "%d %d",
        $elevatorFloor, // floor on which this elevator is found
        $elevatorPos // position of the elevator on its floor
    );
    $elevators[$elevatorFloor] = $elevatorPos;
}

error_log("elevators: ".var_export(showArray($elevators), true));
error_log("exit: $exitFloor, $exitPos");
// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %s",
        $cloneFloor, // floor of the leading clone
        $clonePos, // position of the leading clone on its floor
        $dir // direction of the leading clone: LEFT or RIGHT
    );
    error_log("clone: $cloneFloor, $clonePos, $dir");
    if ($cloneFloor != -1 && $clonePos == -1 && $dir == 'NONE')
        echo("WAIT\n");continue;
    // Objectif selon l'etage
    $goalPos = ($cloneFloor == $exitFloor)? $exitPos : $elevators[$cloneFloor];
    // Si le clone est dans la mauvaise direction
    $action = (($clonePos < $goalPos && $dir == 'LEFT') || ($clonePos > $goalPos && $dir == 'RIGHT'))? 'BLOCK' : 'WAIT';
    echo("$action\n"); // action: WAIT or BLOCK
}

function showArray($tab){
    $str = "";
    foreach ($tab as $key => $value) {
        $str .= "[$key|$value]";
    }
    return $str;
}
?>

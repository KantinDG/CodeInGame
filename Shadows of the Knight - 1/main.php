<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d",
    $WT, // width of the building.
    $HT // height of the building.
);
$WB = ($HB = 0);
fscanf(STDIN, "%d",
    $N // maximum number of turns before game over.
);
fscanf(STDIN, "%d %d",
    $XB,
    $YB
);

// game loop
while (TRUE)
{
    fscanf(STDIN, "%s",
        $bombDir // the direction of the bombs from batman's current location (U, UR, R, DR, D, DL, L or UL)
    );
    if (strpos($bombDir, 'U') !== false)
        $HT = ($YB /= 2);
    else if (strpos($bombDir, 'D') !== false)
        $YB +=  ($HT - $YB) / 2;
    if (strpos($bombDir, 'L') !== false)
        $WT = ($XB /= 2);
    else if (strpos($bombDir, 'R') !== false)
        $XB +=  ($WT - $XB) / 2;
    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));


    // the location of the next window Batman should jump to.
    echo(intval($XB)." ". intval($YB).PHP_EOL);
}
?>
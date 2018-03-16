<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d",
    $LimitRight, // width of the building.
    $LimitBottom // height of the building.
);
$LimitLeft = ($LimitTop = 0);
$LimitRight--;
$LimitBottom--;
fscanf(STDIN, "%d",
    $N // maximum number of turns before game over.
);
fscanf(STDIN, "%d %d",
    $BatmanX,
    $BatmanY
);
// game loop
while (TRUE)
{
    fscanf(STDIN, "%s",
        $bombDir // the direction of the bombs from batman's current location (U, UR, R, DR, D, DL, L or UL)
    );
    if (strpos($bombDir, 'U') !== false) {
        $LimitBottom = $BatmanY;
        $BatmanY -= ceil(abs($LimitTop - $BatmanY) / 2);
    } else if (strpos($bombDir, 'D') !== false) {
        $LimitTop = $BatmanY;
        $BatmanY += ceil(abs($LimitBottom - $BatmanY) / 2);
    }
    if (strpos($bombDir, 'L') !== false) {
        $LimitRight = $BatmanX;
        $BatmanX -= ceil(abs($LimitLeft - $BatmanX) / 2);
    } else if (strpos($bombDir, 'R') !== false) {
        $LimitLeft = $BatmanX;
        $BatmanX +=  ceil(abs($LimitRight - $BatmanX) / 2);
    }
    echo(intval($BatmanX)." ". intval($BatmanY).PHP_EOL);
}
?>

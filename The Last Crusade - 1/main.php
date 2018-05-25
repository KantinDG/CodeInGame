<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d",
    $W, // number of columns.
    $H // number of rows.
);
$MAZE = array();
$CASES = array(
    0 => array(),
    1 => array("TOP" => "BOT", "RIGHT" => "BOT", "LEFT" => "BOT"),
    2 => array("RIGHT" => "LEFT", "LEFT" => "RIGHT"),
    3 => array("TOP" => "BOT"),
    4 => array("TOP" => "LEFT", "RIGHT" => "BOT"),
    5 => array("TOP" => "RIGHT", "LEFT" => "BOT"),
    6 => array("RIGHT" => "LEFT", "LEFT" => "RIGHT"),
    7 => array("TOP" => "BOT", "RIGHT" => "BOT"),
    8 => array("RIGHT" => "BOT", "LEFT" => "BOT"),
    9 => array("TOP" => "BOT", "LEFT" => "BOT"),
    10 => array("TOP" => "LEFT"),
    11 => array("TOP" => "RIGHT"),
    12 => array("RIGHT" => "BOT"),
    13 => array("LEFT" => "BOT"),
    );
for ($i = 0; $i < $H; $i++)
{
    $LINE = stream_get_line(STDIN, 200 + 1, "\n"); // represents a line in the grid and contains W integers. Each integer represents one room of a given type.
    $MAZE[] = explode( " ",  $LINE);
}
fscanf(STDIN, "%d",
    $EX // the coordinate along the X axis of the exit (not useful for this first mission, but must be read).
);

// game loop
while (TRUE)
{
    fscanf(STDIN, "%d %d %s",
        $XI,
        $YI,
        $POS
    );
    $case = $MAZE[$YI][$XI];
    $direction = $CASES[$case][$POS];
    switch ($direction) {
        case 'BOT':
            $YI++;
            break;
        case 'RIGHT':
            $XI++;
            break;
        case 'LEFT':
            $XI--;
            break;
        default:
            break;
    }
    echo("$XI $YI\n");
}
?>

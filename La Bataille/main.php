<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $n // the number of cards for player 1
);
$stackP1 = array();
$replace = ["11", "12", "13", "14"];
$search = ["J", "Q", "K", "A"];
for ($i = 0; $i < $n; $i++)
{
    fscanf(STDIN, "%s",
        $cardp1 // the n cards of player 1
    );
    $stackP1[] = intval(str_replace($search, $replace, $cardp1));
}
fscanf(STDIN, "%d",
        $m // the number of cards for player 2
);
for ($i = 0; $i < $m; $i++)
{
    fscanf(STDIN, "%s",
            $cardp2 // the m cards of player 2
    );
    $stackP2[] = intval(str_replace($search, $replace, $cardp2));
}

$EngageStackP1 = array();
$EngageStackP2 = array();
$battle = 0;
$turn = 0;
while (!empty($stackP1) && !empty($stackP2)) {
    $EngageStackP1[] = array_shift($stackP1);
    $EngageStackP2[] = array_shift($stackP2);
    if ($battle-- > 0) {
        continue;
    }
    switch (end($EngageStackP1) <=> end($EngageStackP2)) {
        case -1:
            $turn++;
            $stackP2 = array_merge($stackP2, $EngageStackP1, $EngageStackP2);
            $EngageStackP1 = array();
            $EngageStackP2 = array();
            break;
        case 0:
            $battle = 3;
            continue 2;
        case 1:
            $turn++;
            $stackP1 = array_merge($stackP1, $EngageStackP1, $EngageStackP2);
            $EngageStackP1 = array();
            $EngageStackP2 = array();
            break;
        default:
            break;
    }
}
if ($battle > 0) {
    echo "PAT\n";
} else if (empty($stackP1)) {
    echo "2 $turn\n";
} else {
    echo "1 $turn\n";
}

function showArray($array) {
    return "[".implode(", ", $array)."]";
}
// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));


?>

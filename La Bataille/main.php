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
error_log('P1 ['.implode(', ', $stackP1)."]");
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
error_log('P2 ['.implode(', ', $stackP2)."]");

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));

echo("PAT\n");
?>

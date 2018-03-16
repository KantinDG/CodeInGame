<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

fscanf(STDIN, "%d",
    $width // the number of cells on the X axis
);
fscanf(STDIN, "%d",
    $height // the number of cells on the Y axis
);
$lines = array();
for ($i = 0; $i < $height; $i++)
{
    $lines[] = str_split(stream_get_line(STDIN, 31 + 1, "\n")); // width characters, each either 0 or .
}

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));

for($i=0;$i<$height;$i++) {
    for($j=0;$j<$width;$j++){
        if ($lines[$i][$j] == "0") {
            echo "$i $j";
            if ($j < $width - 1 && $lines[$i][$j + 1] == "0") {
                echo " ".$i." ".($j + 1);
            } else {
                echo " -1 -1";
            }
            if ($i < $height - 1 && $lines[$i + 1][$j] == "0") {
                echo " ".($i + 1)." $j";
            } else {
                echo " -1 -1";
            }
            echo PHP_EOL;
        }
    }
}
// Three coordinates: a node, its right neighbor, its bottom neighbor
echo("0 0 1 0 0 1\n");
?>

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
    $line = stream_get_line(STDIN, 31 + 1, "\n");
    error_log($line);
    $lines[] = str_split($line); // width characters, each either 0 or .
}

// Parcours de lignes
for($i=0;$i<$height;$i++) {
    // Parcours des cases
    for($j=0;$j<$width;$j++){
        if ($lines[$i][$j] === "0") {
            $node = "$j $i";
            // Premier voisin de droite
            $node .= voisinDroite($lines, $j + 1, $i, $width);
            $node .= voisinBas($lines, $j, $i + 1, $height);
            echo $node.PHP_EOL;
        }
    }
}

function voisinDroite($lines, $j, $i, $width) {
    for (; $j < $width; $j++) {
        if ($lines[$i][$j] === "0")
            return " $j $i";
    }
    return " -1 -1";
}

function voisinBas($lines, $j, $i, $height) {
    for (; $i < $height; $i++) {
        if ($lines[$i][$j] === "0")
            return " $j $i";
    }
    return " -1 -1";
}
?>

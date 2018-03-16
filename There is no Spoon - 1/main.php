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
            $str = "$j $i";
            if ($j < $width - 1 && $lines[$i][$j + 1] === "0") {
                $str .= sprintf(" %d %d", ($j +1), $i);
            } else {
                $str .= " -1 -1";
            }
            if ($i < $height - 1 && $lines[$i + 1][$j] === "0") {
                $str .= sprintf(" %d %d", $j, ($i + 1));
            } else {
                $str .= " -1 -1";
            }
            error_log($str);
            echo $str.PHP_EOL;
        }
    }
}
?>

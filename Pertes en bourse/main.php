<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $n
);
$inputs = fgets(STDIN);
$inputs = explode(" ",$inputs);
$vals = array();
for ($i = 0; $i < $n; $i++)
{
    $vals[intval($inputs[$i])] = 0;
    foreach ($vals as $key => $value) {
      $vals[$key] = (intval($inputs[$i]) - $key < $value) ? intval($inputs[$i]) - $key : $value;
    }
}
echo(min($vals)."\n");
?>

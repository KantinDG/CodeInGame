<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $N
);
$number = array();
$node = 0;
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%s",
        $telephone
    );
    $telephone = str_split($telephone);
    $lenght = count($telephone);
    if (!empty($number)){
        $node += min(array_map(function($item) use ($telephone, $lenght) {
            for($i=0;$i<$lenght&&$i<count($item);$i++) {
                if ($telephone[$i] !== $item[$i])
                    break;
            };
            return $lenght - $i;
        }, $number));
    } else {
        $node = $lenght;
    }
    $number[] = $telephone;
}
echo("$node\n");
?>

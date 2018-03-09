<?php

global $Nodes, $BestPaths, $Exits;
$Exits = array();
fscanf(STDIN, "%d %d %d",
    $N, // the total number of nodes in the level, including the gateways
    $L, // the number of links
    $E // the number of exit gateways
);

$Nodes = array();
for ($i = 0; $i < $L; $i++)
{

    fscanf(STDIN, "%d %d",
        $N1, // N1 and N2 defines a link between these nodes
        $N2
    );
    if (!array_key_exists($N1, $Nodes)) {
        $Nodes[$N1] = array();
        // error_log("new Node($N1)");
    }
    if (!array_key_exists($N2, $Nodes)) {
        $Nodes[$N2] = array();
        // error_log("new Node($N2)");
    }
    $Nodes[$N1][$N2] = $N2;
    $Nodes[$N2][$N1] = $N1;
    // error_log("new Link $N1 - $N2");
}


for ($i = 0; $i < $E; $i++)
{
    fscanf(STDIN, "%d",
        $EI // the index of a gateway node
    );
    $Exits[$EI] = $EI;
}


// error_log("Nodes: ");
// foreach ($Nodes as $key => $node) {
    // error_log("{$key}: ".showArray($node));
// }
error_log("Sorties: ".showArray($Exits));

// game loop
while (TRUE)
{
    $BestPaths = array();
    fscanf(STDIN, "%d",
        $SI // The index of the node on which the Skynet agent is positioned this turn
    );
    error_log("Virus: $SI");
    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    foundPath($SI);
    usort($BestPaths, 'compare_path');
    if (array_key_exists(35, $Nodes))
        error_log(showArray($Nodes[35]));
    error_log("BestPaths: ");
    foreach ($BestPaths as $path) {
        error_log(showArray($path));
    }
    $shortPath = array_reverse($BestPaths[0]);
    $node1 = $shortPath[0];
    $node2 = $shortPath[1];
    // Example: 0 1 are the indices of the nodes you wish to sever the link between
    destroyLink($node1, $node2);
}

function isLoop($path) {
    sort($path);
    // error_log("isLoop ".showArray($path));
    $size = count($path);
    for ($i=0; $i < $size - 1; $i++) {
        if ($path[$i] == $path[$i + 1])
            return true;
    }
    return false;
}

function compare_path ($path1, $path2) {
    return count($path1) <=> count($path2);
}

function foundPath($virusNode, $actualPath = array(), $deph = 0)
{
    global $Nodes, $BestPaths, $Exits;

    $paths = array();
    $actualPath[] = $virusNode;
    // Si le chemin est plus long que les chemin deja trouver on arrete
    if (!empty($BestPaths) && count(min($BestPaths)) <= $deph) {
        // error_log("foundPath: ".showArray($actualPath)." - too long");
        return ;
    }
    // Si le chemin tourne en rond on arrete
    if (isLoop($actualPath)) {
        // error_log("foundPath: ".showArray($actualPath)." - loop");
        return ;
    }
    // Si le chemin est sur une sortie on s'arrete et on le sauvegarde
    if (in_array($virusNode, $Exits)) {
        $BestPaths[] = $actualPath;
        // error_log("foundPath: ".showArray($actualPath)." - path");
        return ;
    }
    // error_log("foundPath: ".showArray($actualPath)." ");
    // On continue notre chemin
    foreach ($Nodes[$virusNode] as $key => $value) {
        foundPath($key, $actualPath, $deph + 1);
    }
}

function destroyLink($Node1, $Node2){
    global $Nodes;
    unset($Nodes[$Node1][$Node2]);
    unset($Nodes[$Node2][$Node1]);
    echo ("$Node1 $Node2".PHP_EOL);
}

function showArray($tab){
    $str = "";
    foreach ($tab as $value) {
        $str .= "[$value]";
    }
    return $str;
}
?>

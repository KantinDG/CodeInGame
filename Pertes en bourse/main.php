<?php
fscanf(STDIN, "%d",
    $n
);
$inputs = array_map('intval', explode(" ", fgets(STDIN)));
$maxPerte = 0;
$minSubTab = $inputs[$n - 1];
for ($i=$n -2; $i >= 0; $i--) {
  $maxPerte = min($maxPerte, ($minSubTab - $inputs[$i]));
  $minSubTab = min($minSubTab, $inputs[$i]);
}
echo ($maxPerte.PHP_EOL);
?>

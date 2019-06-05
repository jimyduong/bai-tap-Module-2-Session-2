<?php
$Arr = [[1, 2, 3, 4, 5, 53, 23],
    [2, -3, 12, -234],
    [12, 34, 533, 12]];

for ($row = 0; $row < count($Arr); $row++) {
    echo "<p><b>Row number $row</b></p>";
    for ($col = 0; $col < count($Arr[$row]); $col++) {
        echo $Arr[$row][$col].",";
    }

}
$max=$Arr[0][0];
for($i=0;$i<count($Arr);$i++){
    for($j=0;$j<count($Arr[$i]);$j++){
        if($Arr[$i][$j]>$max){
            $max=$Arr[$i][$j];
        }

    }
}
echo "<br>";
echo "<br>";
echo "max cua mang la: ".$max;
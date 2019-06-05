<?php
$Arr=[1,2,3,4,5,22,-2,34,12];
$min=$Arr[0];
for($i=0;$i<count($Arr);$i++){
    if($Arr[$i]<$min){
        $min=$Arr[$i];
    }
}
echo $min;
echo "<br>";
echo "max cua mang: ".Max($Arr);
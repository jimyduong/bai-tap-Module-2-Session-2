<?php
$Arr1=[1,2,3,4,5];
$Arr2=[1,2,3,4,5];
$Arr3=[];
function addArray($arr1,$arr2,$arr3){
for($i=0;$i<count($arr1);$i++){
    array_push($arr3,$arr1[$i]);
}

for($j=0;$j<count($arr2);$j++){
    array_push($arr3,$arr2[$j]);}
    return $arr3;

}
var_dump(addArray($Arr1,$Arr2,$Arr3));

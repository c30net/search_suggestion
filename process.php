<?php

$myFile = fopen("names.txt", "r") or die("Unable to open file!");
$namesR =  fread($myFile,filesize("names.txt"));
$namesArray = explode("\r\n", $namesR);




if(!empty($_GET['q'])){
    $hint = '';
    $q = $_GET['q'];
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($namesArray as $name){
        if(stristr($q, substr($name,0,$len))){
            if($hint === ''){
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
    echo $hint;
}

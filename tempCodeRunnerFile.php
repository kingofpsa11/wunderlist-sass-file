<?php
$a=array(0 => ["Name","Peter"],1 => ["Age","41"],2 => ["Country","USA"]);
        $a = array_column($a,'1');
        var_dump($a);
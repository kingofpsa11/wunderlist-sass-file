<?php

class ConNguoi
{
    var $name;
    var $mat;
    var $mui;
    const sochan = 2;

    function an()
    {
        //code
    }

    function noi($caunoi)
    {
        $this->name = $caunoi;
    }

    function di()
    {
        //code
    }
}

$connguoi = new ConNguoi();
echo $connguoi->noi("123");
?>
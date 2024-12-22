<?php
require_once "constant.php";
class Redirect
{
    public function __construct($index = '')
    {
        if ($index != '') {
            $index = $index == '/' ? '' : $index;
            header("location:".base_url.$index."");
        }
    }

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

function generate_reg_id()
{
    return REG_PRE . random_int(100000, 999999);
}
function generate_random_password($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(
        str_shuffle($str_result),
        0,
        $length_of_string
    );
}
?>
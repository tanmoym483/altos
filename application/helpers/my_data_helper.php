<?php
defined('BASEPATH') or exit('No direct script access allowed');

function generate_reg_id()
{
    return REG_PRE . random_int(100000, 999999);
}
function generate_customer_reg_id()
{
    return 'ATC91' . random_int(100000, 999999);
}
function generate_csp_application_reg_id()
{
    return 'ATCSP91' . random_int(100000, 999999);
}
function generate_diagnostic_application_reg_id()
{
    return 'ATDC91' . random_int(100000, 999999);
}
function generate_shop_application_reg_id()
{
    return 'ATOS91' . random_int(100000, 999999);
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
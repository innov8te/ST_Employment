<?php

/* Checking the site authentication */
if (!function_exists('isLogin')) {

    function isLogin() {
        $CI = &get_instance();
        if ($CI->session->userdata('username') && $CI->session->userdata('id')) {
            return true;
        }
        return false;
    }

}


?>
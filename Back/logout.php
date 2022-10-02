<?php
    unset($_COOKIE['user_name']); 
    setcookie("user_name", null, -1, '/');
    unset($_COOKIE['user_user']); 
    setcookie("user_user", null, -1, '/');
    unset($_COOKIE['user_id']); 
    setcookie("user_id", null, -1, '/');
    unset($_COOKIE['user_email']); 
    setcookie("user_email", null, -1, '/');
    unset($_COOKIE['user_rol']); 
    setcookie("user_rol", null, -1, '/');
?>
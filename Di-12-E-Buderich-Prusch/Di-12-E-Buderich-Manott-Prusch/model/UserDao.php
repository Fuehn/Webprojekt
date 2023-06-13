<?php 
    interface UserDao{
        static function store($data);
        function checkLoginData($email, $pw);
        function getUserData($userid);
        static function doesEmailExsist($email);
    }
?>

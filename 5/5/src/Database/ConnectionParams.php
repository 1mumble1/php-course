<?php
    function getConnectionParams(): array
    {
        $dsn = "mysql:host=127.0.0.1;dbname=php_course";
        $user = "root";
        $password = "140804Vfhfn)";
        return [
            'dsn' => $dsn,
            'user' => $user,
            'password' => $password,
        ];
    }
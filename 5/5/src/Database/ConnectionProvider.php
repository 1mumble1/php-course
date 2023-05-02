<?php
    declare(strict_types=1);

    namespace App\Database;
    require_once __DIR__ . "\ConnectionParams.php";

    class ConnectionProvider
    {
        public static function connectDatabase(): \PDO
        {
            $dsn = getConnectionParams()['dsn'];
            $user = getConnectionParams()['user'];
            $password = getConnectionParams()['password'];
            return new \PDO($dsn, $user, $password);
        }
    }
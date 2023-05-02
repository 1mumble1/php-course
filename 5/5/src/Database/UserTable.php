<?php
    declare(strict_types=1);

    namespace App\Database;

    use App\Model\User;

    class UserTable
    {
        private \PDO $connection;

        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        public function addUser(User $user): int 
        {
            $query = <<<SQL
            INSERT INTO user (first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path)
            VALUES (:first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path)
            SQL;
            
            try
            {
                $statement = $this->connection->prepare($query);
                $statement->execute([
                    ':first_name' => $user->getFirstName(),
                    ':last_name' => $user->getLastName(),
                    ':middle_name' => $user->getMiddleName(),
                    ':gender' => $user->getGender(),
                    ':birth_date' => $user->getBirthDate(),
                    ':email' => $user->getEmail(),
                    ':phone' => $user->getPhone(),
                    ':avatar_path' => $user->getAvatarPath(),
                ]);
            }
            catch (Exception $e)
            {
                echo "Пользователь уже был ранее зарегистрирован.\n";
                echo $e->getMessage();
                exit();
            }
            
            return (int)$this->connection->lastInsertId();
        }

        public function findUser(int $id): User 
        {
            $query = <<<SQL
                SELECT 
                    id,
                    first_name,
                    last_name,
                    middle_name,
                    gender,
                    birth_date,
                    email,
                    phone,
                    avatar_path
                FROM user
                WHERE id = $id
                SQL;
            $statement = $this->connection->query($query);

            if ($row = $statement->fetch(\PDO::FETCH_ASSOC))
            {
                return $this->createUserFromRow($row);
            }

            return null;
        }

        private function createUserFromRow(array $row): User
        {
            return new User(
                (int)$row['id'], $row['first_name'],
                $row['last_name'],$row['middle_name'],
                $row['gender'], $row['birth_date'],
                $row['email'], $row['phone'], $row['avatar_path']
            );
        }
    }
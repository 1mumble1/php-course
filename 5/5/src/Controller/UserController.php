<?php
    declare(strict_types=1);

    namespace App\Controller;
    
    use App\Database\ConnectionProvider;
    use App\Database\UserTable;
    use App\Model\User;
    use App\Model\Upload;

    class UserController
    {
        private const HTTP_STATUS_303_SEE_OTHER = 303;

        private UserTable $userTable;
        private Upload $upload;

        public function __construct()
        {
            $connection = ConnectionProvider::connectDatabase();
            $this->userTable = new UserTable($connection);
            $this->upload = new Upload();
        }

        public function index(): void
        {
            require __DIR__ . '/../View/add_user_form.php';
        }

        public function registerUser(array $requestData): void
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            {
                $this->writeRedirectSeeOther('/');
                return;
            }

            $avatarPath = $this->upload->moveImageToUploads($_FILES['avatar_path']);

            $user = new User(
                null,
                $requestData['first_name'],
                $requestData['last_name'],
                $requestData['middle_name'],
                $requestData['gender'],
                $requestData['birth_date'],
                $requestData['email'],
                $requestData['phone'],
                $avatarPath
            );
            $userId = $this->userTable->addUser($user);
            $this->writeRedirectSeeOther("/show_user.php?user_id=$userId");
        }

        public function showUser(array $queryParams): void
        {
            $userId = (int)$queryParams['user_id'];
            if (!$userId)
            {
                $this->writeRedirectSeeOther('/');
                exit();
            }
            $user = $this->userTable->findUser($userId);
            if (!$user)
            {
                $this->writeRedirectSeeOther('/');
                exit();
            }

            require __DIR__ . '/../View/user.php';
        }

        private function writeRedirectSeeOther(string $url): void
        {
            header('Location: ' . $url, true, self::HTTP_STATUS_303_SEE_OTHER);
        }
    }
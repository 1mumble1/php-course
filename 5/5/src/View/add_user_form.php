<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Form of registration</title>
</head>
<body>
    <form enctype="multipart/form-data" action="add_user.php" method="POST">
        <p>Имя: <input type="text" name="first_name" required /></p>
        <p>Фамилия: <input type="text" name="last_name" required /></p>
        <p>Отчество: <input type="text" name="middle_name" /></p>
        <p>Пол: 
            <input type="radio" name="gender" value="man" required /> муж. <br>
            <input type="radio" name="gender" value="woman" required /> жен. <br>
        </p>
        <p>Дата рождения: <input type="date" name="birth_date" required /></p>
        <p>Email: <input type="email" name="email" required /></p>
        <p>Телефон: <input type="tel" name="phone" /></p>
        <p>Аватар: <input type="file" name="avatar_path" accept="image/jpeg, image/png, image/gif" /></p>
        <input type="submit" value="Отправить" />
    </form>
</body>
</html>
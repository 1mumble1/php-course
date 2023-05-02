<?php
/**
 * @var App\Model\User $user
 * @var App\Model\Upload $upload
 */
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>User</title>
</head>
<body>
    <div class="user-page">
        <?php if ($user->getAvatarPath()): ?>
            <img src="<?= htmlentities($upload->getUploadUrlPath($user->getAvatarPath())) ?>" alt='avatar'>>
        <?php endif; ?>
        <h1>
            <?= htmlentities($user->getLastName()) ?>
            <?= htmlentities($user->getFirstName()) ?>
            <?php if ($user->getMiddleName()): ?>
                <?= htmlentities($user->getMiddleName()) ?>
            <?php endif; ?>
        </h1>
        <p>Пол: <?= htmlentities($user->getGender()) ?></p>
        <p>Дата рождения: <?= htmlentities($user->getBirthDate()) ?></p>
        <p>Email: <?= htmlentities($user->getEmail()) ?></p>
        <?php if ($user->getPhone()): ?>
            <p>Телефон: <?= htmlentities($user->getPhone()) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
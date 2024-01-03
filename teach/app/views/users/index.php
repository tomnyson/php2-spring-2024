// app/views/users/index.php
<!DOCTYPE html>
<html>

<head>
    <title>Users List</title>
</head>

<body>
    <h1>Users List</h1>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= htmlspecialchars($user['name']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
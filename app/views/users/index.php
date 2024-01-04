<h2>List User</h2>
<?php foreach ($users as $user) : ?>
    <li><?= $user['email'] ?></li>
<?php endforeach; ?>
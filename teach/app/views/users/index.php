<!DOCTYPE html>
<html>

<?php $title = 'User Page'; ?>

<h2>List User</h2>
<?php foreach ($users as $user) : ?>
<li><?= htmlspecialchars($user['email']) ?></li>
<?php endforeach; ?>
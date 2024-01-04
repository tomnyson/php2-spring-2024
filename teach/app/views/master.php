<!-- views/master.php -->
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <!-- Include other common head elements like CSS files here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container">
    <header>
        <!-- Header content like navigation menu -->
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <?php
    require_once BASE_PATH . '/app/views/includes/footer.php';
    ?>

    <!-- Common JavaScript files -->
</body>

</html>
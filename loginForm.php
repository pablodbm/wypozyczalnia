<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia - logowanie</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php if (isset($_GET["bad_log"])) : ?>
        <!-- do ostylowania -->
        <div>zły login</div>
    <?php endif; ?>
    <?php if (isset($_GET["register"])) : ?>
        <!-- do ostylowania -->
        <div>dokonano rejestracji mozesz sie zalogowac</div>
    <?php endif; ?>

    <div class="formBox">
        <h2>Logowanie</h2>
        <form action="./backend/login.php" method="post">
            <div class="column">
                <div class="inputBox">
                    <label for="login">Login:</label>
                    <input type="text" name="login">
                </div>
                <div class="inputBox">
                    <label for="password">Hasło:</label>
                    <input type="password" name="password">
                </div>
                <div class="submitBox">
                    <input type="submit" value="Zaloguj się">
                </div>
            </div>

        </form>
    </div>
</body>

</html>
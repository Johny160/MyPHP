<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/signin.css">

    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    
    <main>
        <section class="form">
        <h1>Prihlásenie</h1>
            <form action="admin/login.php" method="POST">
                <input class="email" type="email" name="login-email" placeholder="Email">><br>
                <input class="password" type="password" name="login-password" placeholder="Heslo"><br>
                <input class="btn" type="submit" value="Přihlásit se">
            </form>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
    <script src="./js/header.js"></script>
</body>
</html>
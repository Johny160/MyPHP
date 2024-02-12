<?php

require "../classes/Database.php";
require "../classes/Url.php";
require "../classes/Student.php";
require "../classes/Auth.php";

//require "../assets/auth.php";

    session_start();

    if ( !Auth::isLoggedIn() ){
        die("Nepovolený přístup");
    }

    $role = $_SESSION["role"];

    //$connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(Student::deleteStudent($connection, $_GET["id"])) {
            Url::redirectUrl("/www1/admin/students.php?id=$id");
        };
    }

?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-delete-student.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Smazat žáka</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    <main>

    <?php if($role == "admin"): ?>
        <section class="delete-form">
            <form method="POST">
                <p>Jste si jisti, že chcete tohoto žáka smazat?</p>
                <div class="btns">
                    <button>Smazat</button>
                    <a href="one-student.php?id=<?= $_GET['id'] ?>">Zrušit</a>
                </div>
            </form>
        </section>
    <?php else: ?>
        <section class="info-box">
            <h1>Obsah tejto stránky je k dispozícií iba administrátorovi.</h1>
        </section>
    <?php endif; ?>

        
    </main>
   
    <?php require "../assets/footer.php"; ?>

    <script src="../js/header.js"></script>
</body>
</html>
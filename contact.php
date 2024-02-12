<?php

$first_name = "";
$second_name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
}

$errors = [];

    if ($first_name === ""){
        $errors[] = "Prosím, vložte do formuláře vaše křestní jméno";
    }

    if ($second_name === ""){
        $errors[] = "Prosím, vložte do formuláře vaše příjmení";
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors[] = "Prosím, vložte do formuláře váš email";
    }

    if($message === ""){
        $errors[] = "Prosím, napište do formuláře zprávu";
    }

    if(empty($errors)){
        // Odešli data z formuláře na email
    }


?>

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

    <title>Contact</title>
</head>
<body>
    <?php require "assets/header.php"; ?>

    <main>
        <h1>Kontaktný formulár</h1>
        
        <section class="errors">
            <?php if(!empty($errors)): ?>
                <ul>
                    <?php foreach($errors as $one_error): ?>
                        <li><?= $one_error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

        <section class="form">
            <form action="contact.php" method="POST">
                <input  type="text" 
                        name="first_name" 
                        placeholder = "Krstné meno"
                        value= "<?= $first_name ?>"
                        required><br>

                <input  type="text" 
                        name="second_name" 
                        placeholder = "Priezvisko"
                        value= "<?= $second_name ?>"
                        required><br>

                <input  type="email" 
                        name="email" 
                        placeholder = "Email"
                        value= "<?= $email ?>"
                        required><br>

                <textarea name="message" 
                        placeholder = "Vaša správa"
                        required><?= $message; ?>
                        </textarea><br>

                <button>Odeslat</button>
            </form>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
    <script src="./js/header.js"></script>

</body>
</html>
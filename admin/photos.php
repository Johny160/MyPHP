<?php


require "../classes/Database.php";
require "../classes/Auth.php";
require "../classes/Image.php";

session_start();

// Ověření, zda je uživatel přihlášený
if ( !Auth::isLoggedIn() ){
    die("Nepovolený přístup");
}

//$user_id = $_SESSION["logged_in_user_id"]; // 2

$db = new Database();
$connection = $db->connectionDB();

$user_id = $_SESSION["logged_in_user_id"]; // 2

$allImages = Image::getImagesByUserId($connection, $user_id);
//var_dump($allImages);

if ($_SERVER["REQUEST_METHOD"] === "POST") {}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-photos.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Photos</title>
</head>
<body>

    <?php require "../assets/admin-header.php" ?>

    <main>
        <section class="upload-photos">
            <h1>Fotky</h1>

            <form action="upload-photos.php" method="POST" enctype="multipart/form-data">
                <label for="choose-file">Vybrať obrázok</label>
                <input type="file" id="choose-file" name="image" require>
                <input type="submit" class="upload-file" name="submit" value="Nahrať obrázok">
            </form>
        </section>

        <section class="images">
        <article>
            <?php foreach($allImages as $one_image): ?>
            <div>
                <div>
                    <img src=<?= "../uploads/" . $user_id . "/" . $one_image["image_name"]?> >
                </div>
                <div class="images-btn">
                    <a class="images-btn-download" href=<?= "../uploads/" . $user_id . "/" . $one_image["image_name"] ?> download="stiahnuty-subor">Stiahnuť</a>
                    <a class="images-btn-delete" href="delete-photo.php?id=<?= $user_id ?>&image_name=<?= $one_image["image_name"] ?>">Vymazať</a>
                </div>
            </div>
            <?php endforeach; ?>
        </article>
    </section>
    </main>

    <?php require "../assets/footer.php" ?>
    <script src="../js/header.js"></script>

</body>
</html>
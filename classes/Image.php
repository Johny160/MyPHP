<?php

class Image {

    //Vloženie obrázka do databázy
    public static function insertImage($conn, $user_id, $image_name){
        $sql = "INSERT INTO image (user_id, image_name)
                VALUES (:user_id, :image_name)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":image_name", $image_name, PDO::PARAM_STR);

        if($stmt->execute()) {
            return true;
        }
    }


    //Výber obrázka z databázy
    public static function getImagesByUserId($conn, $user_id){
        $sql = "SELECT image_name
                FROM image
                WHERE user_id = :user_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);

        $stmt->execute();

        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $images;
        }
       
        
    //Vymazanie obrázka zo zložky
    public static function deletePhotoFromDirectory($path){
        try {
            // Kontrola existence souboru
            if(!file_exists($path)){
                throw new Exception("Soubor neexistuje a preto nemože byž zmazaný.");
            }

            // Smazání souboru
            if(unlink($path)){
                return true;
            } else {
                throw new Exception("Pri vymazaní súboru došlo k chybe.");
            }
        } catch (Exception $e) {
            echo "Chyba: " . $e->getMesssage();
        }
    }


    //Vymazanie obrázka z databázy
    public static function deletePhotoFromDatabase($conn, $image_name){
        $sql = "DELETE FROM image
                WHERE image_name = :image_name";

        $stmt = $conn->prepare($sql);

        try {
            $stmt->bindValue(":image_name", $image_name, PDO::PARAM_STR);

            if (!$stmt->execute()){
                throw new Exception("Obrázek se nepodařilo smazat z databáze");
            }
        } catch (Exception $e) {
            echo "Chyba: " . $e->getMessage();
        }
    }
        
}
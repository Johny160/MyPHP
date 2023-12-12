<?php

class Url {

    public static function redirectUrl($path) {
        if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
            $url_protocol = "https";
        } else {
            $url_protocol = "http";
        }

        // localhost = $_SERTVER["HTTP_HOST"]
    
        // header("location: jeden-ziak.php?id=$id");
        header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . $path);

        //http://localhost:8080/www1/jeden-ziak.php?id=307
    }

}
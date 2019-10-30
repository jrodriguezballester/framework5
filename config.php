<?php

return array(
    "site" => array(
        "root" => "http://localhost/DWS/login",
    ),
    "DB" => array(
        // $this->bbdd = new PDO("$connection:dbname=$dbname;host=$host:$port", "$username", "$password");
        "CONNECTION" => "mysql",
        //El host es db porque estamos utilizando docker (mirar docker-compose.yml)
        "HOST" => "localhost",
        "PORT" => "3306",
        "NAME" => "nba",
        "USERNAME" => "root",
        "PASSWORD" => "root",
    )
);
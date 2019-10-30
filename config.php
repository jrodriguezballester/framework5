<?php

return array(
    "site" => array(
        "root" => "http://localhost/DWS/login",
    ),
    "DB" => array(
        "CONNECTION" => "mysql",
        //El host es db porque estamos utilizando docker (mirar docker-compose.yml)
        "HOST" => "db",
        "PORT" => "3306",
        "NAME" => "nba",
        "USERNAME" => "root",
        "PASSWORD" => "root",
    )
);
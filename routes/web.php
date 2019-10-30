<?php

$subdomain = 'DWS/framework/4';

return array(	
	"routes" => array(
		"/" => array(
			"route" => $subdomain."/",
			"controller" => "index",
			"action" => "index"
		),

		"Historia" => array(
			"route" => $subdomain."/historia",
			"controller" => "index",
			"action" => "historia"
		),

		"Jugadores" => array(
			"route" => $subdomain."/jugadores",
			"controller" => "index",
			"action" => "jugadores"
		),

		"Jugador" => array(
			"route" => $subdomain."/jugador/:idJugador",
			"controller" => "jugador",
			"action" => "datosJugador"
		),

		"Registro" => array(
			"route" => $subdomain."/registro",
			"controller" => "index",
			"action" => "registro"
		),

		"RegistroUsuario" => array(
			"route" => $subdomain."/registroUsuario",
			"controller" => "register",
			"action" => "register"
		),

		"login" => array(
			"route" => $subdomain."/login",
			"controller" => "index",
			"action" => "login"
		),

		"compruebaLogin" => array(
			"route" => $subdomain."/compruebaLogin",
			"controller" => "login",
			"action" => "validate"
		),

		"logout" => array(
			"route" => $subdomain."/logout",
			"controller" => "login",
			"action" => "logout"
		),

	),
	"error" => "error.php"
);


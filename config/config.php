<?php

//Connessione al database, modificare con le proprie 
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ambulacare');
define('DB_USER', 'root');
define('DB_PASS', '');

//parametri di customizzazione dell'applicazione web
define('MAX_IMAGE_SIZE', 5242880); // 5MB
define('ALLOWED_IMAGE_TYPE',['image/jpeg', 'image/png', 'image/jpg']);

//settaggio del timeout del cookie
define('COOKIE_EXP_TIME', 1209600); // 2 settimane 
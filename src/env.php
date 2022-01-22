<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| Basic Configuration
 *|--------------------------------------------------------------------------
 **/
define('__ROOT__', dirname(dirname(__FILE__)));
define('__DOMAIN__', 'http://localhost');
define('__MASTER_LEVEL__', 4);
define('__GM_LEVEL__', 0);
define('LANG', 'en-US');

/**
 *   
 *|--------------------------------------------------------------------------
 *| reCAPTCHA V2 Configuration
 *|--------------------------------------------------------------------------
 **/
define('RECAPTCHA_SECRET', '6LdbH-kcAAAAAIb6wA_1wARCX3iDuX7WhDeaWKV2');
define('RECAPTCHA_PUBLIC', '6Hpe20Cpsv0igkMyGljetjTp3qD4NjEBU4v5JcfU');

/**
 *   
 *|--------------------------------------------------------------------------
 *| reCAPTCHA V3 Configuration
 *|--------------------------------------------------------------------------
 **/
define('RECAPTCHA_SECRETV3', '6Ldcf3EaAAAAAH4KjvqtNIvuneYqs7fH1TJU_QSh');
define('RECAPTCHA_PUBLICV3', '6Ldcf3EaAAAAAN72ImnCflolKff31rVbTa7Mwxnp');

/**
 *   
 *|--------------------------------------------------------------------------
 *| Database Configuration
 *|--------------------------------------------------------------------------
 **/
define('DATABASE_HOST',   'localhost');
define('DATABASE_USER',   'postgres');
define('DATABASE_PASSWORD', '123456');
define('DATABASE_NAME',     'pb');

/**
 *   
 *|--------------------------------------------------------------------------
 *| PHPMailer Configuration
 *|--------------------------------------------------------------------------
 **/
define('MAIL_HOST',       'smtp.gmail.com');
define('MAIL_PORT',       587);
define('MAIL_USERNAME',   'YOUR EMAIL');
define('MAIL_PASSWORD',   'YOUR PASSWORD'); // REMOVIDO
define('MAIL_ENCRYPTION', 'tls');
define('MAIL_FROM_EMAIL', 'YOUR EMAIL');
define('MAIL_FROM_NAME',  'YORU NAME');

/**
 *   
 *|--------------------------------------------------------------------------
 *| Secret Questions
 *|--------------------------------------------------------------------------
 **/
define('SECRET_QUESTIONS', ['Melhor amigo', 'Time favorito', 'Cor Favorita']);;


/**
 *   
 *|--------------------------------------------------------------------------
 *| EVENT Configuration
 *|--------------------------------------------------------------------------
 **/
define('EVENT_ACTIVE',      true);
define('REWARD_BY_LOGGIN',  true);
define('REWARD_BY_CODE',    true);


/**
 *   
 *|--------------------------------------------------------------------------
 *| Levels Acess
 *|--------------------------------------------------------------------------
 **/
define('LEVELS_ACCESS', [
  '-1' => "Banned",
  '0' => 'Player',
  '1' => 'Youtuber',
  '2' => 'Moderador',
  '3' => 'Game Master',
  '5' => 'Master',
  '6' => 'Admin',
]);
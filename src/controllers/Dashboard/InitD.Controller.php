<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Init Controller DashBoard
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

/**
 *|-------------------------------------------------------------------------
 *| Own modules
 *|--------------------------------------------------------------------------
 */
require 'UsersD.Controller.php';
require 'NewsD.Controller.php';

use BixcoitoDoce\CMUsersD\UsersD;
use BixcoitoDoce\CMNewsD\NewsD;

$InitD = [
  'Users' =>  [
    "Responsive" =>  UsersD::class,
  ],
  'News' => [
    "Responsive" =>  NewsD::class,
  ],
];


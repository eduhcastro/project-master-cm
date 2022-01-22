<?php
/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Load 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/
session_start();
require 'env.php';
require 'controllers/Routers.Controller.php';
use BixcoitoDoce\CMRouters\RoutersController;
$Router = new RoutersController([
  "client/mac",
  "home",
  "change-password",
  "event/now",
  "event/changer",
  "download",
  "notices/events",
  "notices/news",
  "notices/patch",
  "ranking/individual",
  "ranking/clan",
  "authenticate/cadastrar",
  "authenticate/login",
  "authenticate/finish",
  "authenticate/check",
  "authenticate/retrieve-account",
  "user/logout",
  "user/authenticate",
  "user/register",
  "user/index",
  "user/change-data",
  "game/introducao",
  "recharge/pin-code",
  "pop-up/coupon",
  "pop-up/pin",
  "retrive-account/email",
  "retrive-account/questions",
  "retrive-account/changer",
  "dashboard/controller/index",
  "dashboard/controller/users/index",
  "dashboard/controller/users/list",
  "dashboard/controller/users/list-banneds",
  "dashboard/controller/users/list-gms",
  "dashboard/controller/users/edit-user",
  "dashboard/controller/users/search",
  "dashboard/controller/notices/index",
  "dashboard/controller/notices/list",
  "dashboard/controller/notices/create",
  "dashboard/controller/pop-up/index",
  "dashboard/controller/authenticate",
  "client/auth/log-in",
  "client/user/edit-basic",
  "client/user/edit-password",
  "client/user/edit-question",
  "client/user/edit-extra",
  "client/user/edit-event",
  "client/user/delete",
  "client/user/search",
  "pop-up/dailycash",
  "FINISH-NO-DELETE"
]);

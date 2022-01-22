<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Application 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

require 'load.php';
$Router->create("client/mac",             "api",  "GET", "GHOST");

/**
 *   
 *|--------------------------------------------------------------------------
 *| User Router
 *|--------------------------------------------------------------------------
 **/
$Router->create("user/index",     "view", "GET", "AUTH");

/**
 *   
 *|--------------------------------------------------------------------------
 *| User Router API
 *|--------------------------------------------------------------------------
 **/
$Router->create("user/change-data",    "api", "POST", "AUTH");


/**
 *   
 *|--------------------------------------------------------------------------
 *| EVENT ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("event/now",       "view");
$Router->create("event/changer",   "api", "POST", "AUTH");

/**
 *   
 *|--------------------------------------------------------------------------
 *| COMUM ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("home",              "view");
$Router->create("download",          "view");
$Router->create("change-password", "view", "GHOST");

/**
 *   
 *|--------------------------------------------------------------------------
 *| AUTHENTICATE ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("authenticate/cadastrar", "view", "GHOST");
$Router->create("authenticate/login",     "view", "GHOST");
$Router->create("authenticate/finish",    "view", "GHOST");
$Router->create("authenticate/check",     "view", "GHOST");
$Router->create("authenticate/retrieve-account", "view", "GHOST");

/**
 *   
 *|--------------------------------------------------------------------------
 *| AUTHENTICATE ROUTES API
 *|--------------------------------------------------------------------------
 **/
$Router->create("user/authenticate", "api", "POST", "GHOST");
$Router->create("user/register",     "api", "POST", "GHOST");

/**
 *   
 *|--------------------------------------------------------------------------
 *| NOTICES ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("notices/events",         "view");
$Router->create("notices/news",           "view");
$Router->create("notices/patch",          "view");

/**
 *   
 *|--------------------------------------------------------------------------
 *| RANKING ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("ranking/individual",     "view");
$Router->create("ranking/clan",           "view");

/**
 *   
 *|--------------------------------------------------------------------------
 *| GAME ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("game/introducao",     "view");

/**
 *   
 *|--------------------------------------------------------------------------
 *| RECHARGES ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("recharge/pin-code",     "view", "AUTH");

/**
 *   
 *|--------------------------------------------------------------------------
 *| RECHARGES ROUTES API
 *|--------------------------------------------------------------------------
 **/
$Router->create("pop-up/pin",          "api", "POST", "AUTH");
$Router->create("pop-up/coupon",       "api", "POST", "AUTH");


/**
 *   
 *|--------------------------------------------------------------------------
 *| RETRIEVE ACCOUNT ROUTES API
 *|--------------------------------------------------------------------------
 **/
$Router->create("retrive-account/email",          "api", "POST", "GHOST");
$Router->create("retrive-account/questions",      "api", "POST", "GHOST");
$Router->create("retrive-account/changer",        "api", "POST", "GHOST");


/**
 *   
 *|--------------------------------------------------------------------------
 *| DASHBOARD MASTER ROUTES
 *|--------------------------------------------------------------------------
 **/
$Router->create("dashboard/controller/authenticate",   "view", "GHOST",      "CLIENT");
$Router->create("dashboard/controller/index",          "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/index",    "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/list",     "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/list-banneds", "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/list-gms",    "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/edit-user",   "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/users/search",      "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/notices/index",     "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/notices/list",      "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/notices/create",    "view", "AUTH", "GM", "CLIENT", "MAC");
$Router->create("dashboard/controller/pop-up/index",      "view", "AUTH", "GM", "CLIENT", "MAC");


/**
 *   
 *|--------------------------------------------------------------------------
 *| DASHBOARD MASTER ROUTES API
 *|--------------------------------------------------------------------------
 **/
$Router->create("client/auth/log-in",             "api",  "POST", "GHOST", "CLIENT");
$Router->create("client/user/edit-basic",         "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/edit-password",      "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/edit-question",      "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/edit-extra",         "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/edit-event",         "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/delete",             "api",  "POST", "AUTH",  "CLIENT", "MAC");
$Router->create("client/user/search",             "api",  "POST", "AUTH",  "CLIENT", "MAC");


/**
 *   
 *|--------------------------------------------------------------------------
 *| MORE ROUTES 
 *|--------------------------------------------------------------------------
 **/
$Router->create("pop-up/dailycash",       "api",  "GET", "AUTH");
$Router->create("user/logout",            "api",  "GET", "AUTH");
$Router->create("FINISH-NO-DELETE",       "api",  "GET", "AUTH");

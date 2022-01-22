<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Init Controller 
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
require 'Authenticate.Controller.php';
require 'User.Controller.php';
require 'Recaptcha.Controller.php';
require 'Ranks.Controller.php';
require 'Addons.Controller.php';
require 'News.Controller.php';
require 'Register.Controller.php';
require 'PHPMailer.Controller.php';
require 'CheckAccount.Controller.php';
require 'Recharge.Controller.php';
require 'Items.Controller.php';
require 'RewardEvent.Controller.php';
require 'RetrieveAccount.controller.php';
require 'Dailycash.Controller.php';
require 'Client.Controller.php';

/**
 *|-------------------------------------------------------------------------
 *| Others modules
 *|--------------------------------------------------------------------------
 */
require './src/modules/PHPMailer/Exception.php';
require './src/modules/PHPMailer/PHPMailer.php';
require './src/modules/PHPMailer/SMTP.php';

use BixcoitoDoce\CMCheckAccount\CheckAccount;
use BixcoitoDoce\CMAuthenticate\{Authenticate, AuthenticateClient};
use BixcoitoDoce\Dailycash\DailyCash;
use BixcoitoDoce\CMRRecharge\{RechargePin, RechargeCoupon};
use BixcoitoDoce\CMRecaptcha\Recaptcha;
use BixcoitoDoce\CMRanks\{Addons, Features};
use BixcoitoDoce\CMRegister\Register;
use BixcoitoDoce\CMAddons\AddonsRoot;
use BixcoitoDoce\Event\{SpecialResponsive, SpecialUsage, SpecialFeatures};
use BixcoitoDoce\CMUser\{User, UserMore};
use BixcoitoDoce\CMNews\News;
use BixcoitoDoce\RetrieveAccount\{Email, Questions, ChangePassword};
use BixcoitoDoce\Client\{Mac,Usage};



$Init = [
  'Authenticate' =>  Authenticate::class,
  'CheckAccount' =>  CheckAccount::class,
  'FeaturesRanks' =>  Features::class,
  'Register' =>       Register::class,
  'FeaturesNews' =>   News::class,
  'AddonsRanks' =>  Addons::class,
  'AddonsRoot' =>   AddonsRoot::class,
  'Recaptcha' =>    Recaptcha::class,
  'DailyCash' =>    DailyCash::class,
  'UserMore' =>   UserMore::class,
  'User' =>       User::class,
  'Recharge' =>  [
    'pin' =>      RechargePin::class,
    'coupon' =>   RechargeCoupon::class
  ],
  'Event' =>  [
    "Responsive" =>  SpecialResponsive::class,
    "Usage" =>       SpecialUsage::class,
    "Features" =>    SpecialFeatures::class
  ],
  'Retrive' =>  [
    "Email" =>            Email::class,
    "Questions" =>        Questions::class,
    "Password" =>         Password::class
  ],
  'Client' =>  [
    "Mac" =>    Mac::class,
    "Usage" =>  Usage::class,
    "Advance" => [
      "Authenticate" =>  AuthenticateClient::class,
    ]
  ]
];


//$CheckAccount =  new CheckAccount();
//$FeaturesRanks = new Features();
//$Authenticate =   new Authenticate();
//$Register =       new Register();
//$FeaturesNews =   new News();
//$AddonsRanks =    new Addons();
//$AddonsRoot =     new AddonsRoot();
//$Recaptcha =      new Recaptcha();
//$DailyCash =      new DailyCash();
//$UserMore =       new UserMore();
//$User =           new User();
//$Recharge = [
//  "pin" =>    new RechargePin(),
//  "coupon" => new RechargeCoupon()
//];
//$Event =   [
//  "Responsive" => new SpecialResponsive(), 
//  "Usage" =>      new SpecialUsage(),
//  "Features" =>   new SpecialFeatures()
//];
//$Retrive = [
//  "Email" =>      new Email(),
//  "Questions" =>  new Questions(),
//  "Password" =>   new ChangePassword()
//];

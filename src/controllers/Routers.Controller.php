<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Routes 
 *|--------------------------------------------------------------------------
 *|
 *| This file is dedicated for defining HTTP routes. A single file is enough
 *| for majority of projects, however you can define routes in different
 *| files and just make sure to import them inside this file. For example
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMRouters;


class Middleware
{

  public function __construct($args)
  {
    $this->args = $args;
  }

  private function isAuth()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: /authenticate/login");
      exit;
    }
  }

  private function isGhost()
  {
    if (isset($_SESSION['user'])) {
      header("Location: /home");
      exit;
    }
  }

  private function isPost()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      header("Location: /home");
      exit;
    }
  }

  private function isGet()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'GET') {
      header("Location: /home");
      exit;
    }
  }

  public function eventCheck($file = null)
  {
    if ($file != "authenticate") {
      if (EVENT_ACTIVE) {
        if (!isset($_SESSION["event"]) && !isset($_SESSION["mac"])) {
          $_SESSION["event"] = true;
          header("Location: /event/now");
          exit;
        }
      }
    }
  }

  public function isGM()
  {
    if (__GM_LEVEL__ > $_SESSION["master"]) {
      header("Location: /home");
      exit;
    }
  }
  public function isMaster()
  {
    if (__MASTER_LEVEL__ > $_SESSION["master"]) {
      header("Location: /home");
      exit;
    }
  }

  public function executeMiddleware()
  {
    foreach ($this->args as $arg => $value) {
      if (strtoupper($value) == 'AUTH') {
        $this->isAuth();
      }
      if (strtoupper($value) == 'GHOST') {
        $this->isGhost();
      }
      if (strtoupper($value) == 'POST') {
        $this->isPost();
      }
      if (strtoupper($value) == 'GET') {
        $this->isGet();
      }
      if (strtoupper($value) == 'MASTER') {
        $this->isMaster();
      }
      if (strtoupper($value) == 'GM') {
        $this->isGM();
      }
    }
  }
}

class MiddlewareDashBoard
{
  public function __construct($args)
  {
    $this->args = $args;
  }

  private function checkBrowser()
  {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    return strpos($user_agent, 'Electron');
  }

  private function checkMac()
  {
    return isset($_SESSION['mac']);
  }

  public function execute()
  {
    foreach ($this->args as $arg => $value) {
      if (strtoupper($value) == 'CLIENT') {
        if (!$this->checkBrowser()) {
          header("Location: /home");
          exit;
        }
      }
      if (strtoupper($value) == 'MAC') {
        if (!$this->checkMac()) {
          header("Location: /home");
          exit;
        }
      }
    }
  }
}


class RoutersController
{

  public function __construct($teste)
  {
    $this->arrayPaths = $teste;
  }

  private function createPathString($array)
  {
    $string = '';
    foreach ($array as $key => $value) {
      if (end($array) == $value) {
        $string .= $value;
      } else {
        $string .= $value . '/';
      }
    }
    return $string;
  }

  private function pathServer()
  {
    $Request = filter_input(INPUT_SERVER, 'REQUEST_URI');
    $Inite = strpos($Request, '?');
    if ($Inite) :
      $Request = substr($Request, 0, $Inite);
    endif;
    $RequestFolder = substr($Request, 1);
    return explode('/', $RequestFolder);
  }

  private function fileRouter($path, $type, $file)
  {

    if (count($path) > 1) {
      $string = '';
      foreach ($path as $key => $value) {
        if ($key + 1 < count($path)) {
          $string .= '' . $value . '/';
        }
      }
      //echo 'src/routers/' . $type . '/' . $string. '' . $file . '.php';
      return 'src/routers/' . $type . '/' . $string . '' . $file . '.php';
      //return 'src/routers/' . $type . '/' . $path[0] . '/' . $file . '.php';
    }
    return 'src/routers/' . $type . '/' . $file . '.php';
  }

  private function argsRouter($arrayargs)
  {
    $Args = [];
    foreach ($arrayargs as $key => $value) {
      if (strtoupper($value) == "POST") {
        $Args[$key] = "POST";
      }
      if (strtoupper($value) == "GET") {
        $Args[$key] = "GET";
      }
      if (strtoupper($value) == "AUTH") {
        $Args[$key] = "AUTH";
      }
      if (strtoupper($value) == "GHOST") {
        $Args[$key] = "GHOST";
      }
      if (strtoupper($value) == "MASTER") {
        $Args[$key] = "MASTER";
      }
      if (strtoupper($value) == "GM") {
        $Args[$key] = "GM";
      }
      if (strtoupper($value) == "CLIENT") {
        $Args[$key] = "CLIENT";
      }
      if (strtoupper($value) == "MAC") {
        $Args[$key] = "MAC";
      }
    }
    return $Args;
  }

  public function create($path, $type, ...$agrs)
  {

    if ($this->pathServer()[0] == '') {
      $MiddleWare = new Middleware($this->argsRouter($agrs));
      require "Init.Controller.php";
      $MiddleWare->eventCheck();
      require($this->fileRouter(["home"], "view", "home"));
      exit;
    }


    if ($path == $this->createPathString($this->pathServer())) {

      $path = explode('/', $path);
      if (count($path) == 0) {
        $file = $path;
      } else {
        $file = end($path);
      }
      if (file_exists($this->fileRouter($path, $type, $file))) {
        $MiddleWare = new Middleware($this->argsRouter($agrs));
        $MiddlewareDashBoard = new MiddlewareDashBoard($this->argsRouter($agrs));
        $MiddleWare->executeMiddleware();
        $MiddlewareDashBoard->execute();

        if ($type == 'api' && $agrs[0] == "POST" && $_SERVER['REQUEST_METHOD'] != 'POST') {
          echo '<script>window.location.replace("/home");</script>';
          die();
        }
        if ($type == 'api') header("Content-Type: application/json");
        require 'src/lang/'.LANG.'.php';
        require "Init.Controller.php";
        if (array_search("MAC", $this->argsRouter($agrs))) require "Dashboard/InitD.Controller.php";

        if ($type != 'api') $MiddleWare->eventCheck($file);
        if ($file == 'now' && !EVENT_ACTIVE) {
          header("Location: /home");
          exit;
        }
        require($this->fileRouter($path, $type, $file));
        exit;
      } else {
        echo '<script>window.location.replace("/home");</script>';
        die();
      }
    }

    if ($path == end($this->arrayPaths)) {
      http_response_code(404);
      exit;
    }


    //  $key = array_search($this->createPathString($this->pathServer()), $this->arrayPaths);
    //  if ($key !== false) {
    //    echo $path;
    //    $path = $this->createPathString($this->pathServer());
    //    $path = explode('/', $path);
    //    if (count($path) == 0) {
    //      $file = $path;
    //    } else {
    //      $file = end($path);
    //    }
    //    if (file_exists($this->fileRouter($path, $type, $file))) {
    //      $MiddleWare = new Middleware($this->argsRouter($agrs));
    //      $MiddleWare->executeMiddleware();
    //      $Authenticate = new Authenticate();
    //      //$Conn = new Connection('localhost', 'postgres', '123456', 'postgres');
    //      if ($type == 'api' && $agrs[0] == "POST" && $_SERVER['REQUEST_METHOD'] != 'POST') {
    //        echo '<script>window.location.replace("/home");</script>';
    //        die();
    //      }
    //      if ($type == 'api') header("Content-Type: application/json");
    //      require($this->fileRouter($path, $type, $file));
    //      exit;
    //    } else {
    //      echo "404";
    //      exit;
    //    }
    //  
    //}
  }
}


 //var_dump($this->GETTool());
    //if ($middleware != null) {
    //  $Middle = new Middleware($middleware);
    //  if (!$Middle->execute()) {
    //    echo "OPAAAAA";
    //    echo '<script>window.location.replace("/home");</script>';
    //    die();
    //  }
    //}
    //echo $path;
    //$key = array_search($this->createPathString($this->pathServer()), $this->arrayPaths);
    //if ($key !== false) {
    //  $path = explode('/', $this->arrayPaths[$key]);
    //  if (count($path) == 0) {
    //    $file = $path;
    //  } else {
    //    $file = end($path);
    //  }

    //  if (file_exists($this->fileRouter($path, $type, $file))) {
    //    $MiddleWare = new Middleware($this->argsRouter($agrs));
    //    var_dump($agrs);
    //    //$MiddleWare->executeMiddleware();
    //    if ($type == 'api' && $agrs[0] == "POST" && $_SERVER['REQUEST_METHOD'] != 'POST') {
    //      echo '<script>window.location.replace("/home");</script>';
    //      die();
    //    }
    //    if ($type == 'api') header("Content-Type: application/json");
    //    require($this->fileRouter($path, $type, $file));
    //    exit;
    //  }
    //} else {
    //  echo '<script>window.location.replace("/home");</script>';
    //  die();
    //}
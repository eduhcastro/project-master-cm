<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Addons 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMAddons;

class AddonsRoot
{

  public function getParams($URL)
  {
    $parts = parse_url($URL);
    @parse_str($parts['query'], $query);
    return $query;
  }
  private function onlyNumber($Obejto)
  {
    $res = preg_replace("/[^0-9.]/", "", "$Obejto");
    return $res;
  }

  public function getPage($URL)
  {
    $PaginaHref = $this->onlyNumber(@$this->getParams($URL)['page']);
    $PaginaAtual = $PaginaHref;
    if (!$PaginaAtual) {
      $pc = "1";
    } else {
      $pc = $PaginaAtual;
    }
    $inicio = $pc - 1;
    $inicio = $inicio * 20;
    return $inicio;
  }
}

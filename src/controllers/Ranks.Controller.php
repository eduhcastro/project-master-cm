<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Ranks 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMRanks;

use BixcoitoDoce\CMPDOProstgreSQL\{Connection};


class Addons
{

  public function player($Num)
  {
    switch ($Num) {
      case 0:
        return 'Trainee';
      case 1:
        return 'Senior Trainee';
      case 2:
        return 'Private';
      case 3:
        return 'Corporal';
      case 4:
        return 'Sergeant';
      case 5:
        return 'Sergeant Grade 1';
      case 6:
        return 'Sergeant Grade 2';
      case 7:
        return 'Sergeant Grade 3';
      case 8:
        return 'Sergeant 1st Class Grade 1';
      case 9:
        return 'Sergeant 1st Class Grade 2';
      case 10:
        return 'Sergeant 1st Class Grade 3';
      case 11:
        return 'Sergeant 1st Class Grade 4';
      case 12:
        return 'Master Sergeant Grade 1';
      case 13:
        return 'Master Sergeant Grade 2';
      case 14:
        return 'Master Sergeant Grade 3';
      case 15:
        return 'Master Sergeant Grade 4';
      case 16:
        return 'Master Sergeant Grade 5';
      case 17:
        return '2nd lieutenant Grade 1';
      case 18:
        return '2nd lieutenant Grade 2';
      case 19:
        return '2nd lieutenant Grade 3';
      case 20:
        return '2nd lieutenant Grade 4';
      case 21:
        return '1st lieutenant Grade 1';
      case 22:
        return '1st lieutenant Grade 2';
      case 23:
        return '1st lieutenant Grade 3';
      case 24:
        return '1st lieutenant Grade 4';
      case 25:
        return '1st lieutenant Grade 5';
      case 26:
        return 'Captian Grade 1';
      case 27:
        return 'Captian Grade 2';
      case 28:
        return 'Captian Grade 3';
      case 29:
        return 'Captian Grade 4';
      case 30:
        return 'Captian Grade 5';
      case 31:
        return 'Major Grade 1';
      case 32:
        return 'Major Grade 2';
      case 33:
        return 'Major Grade 3';
      case 34:
        return 'Major Grade 4';
      case 35:
        return 'Major Grade 5';
      case 36:
        return 'Lt Colonel Grade 1';
      case 37:
        return 'Lt Colonel Grade 2';
      case 38:
        return 'Lt Colonel Grade 3';
      case 39:
        return 'Lt Colonel Grade 4';
      case 40:
        return 'Lt Colonel Grade 5';
      case 41:
        return 'Colonel Grade 1';
      case 42:
        return 'Colonel Grade 2';
      case 43:
        return 'Colonel Grade 3';
      case 44:
        return 'Colonel Grade 4';
      case 45:
        return 'Colonel Grade 5';
      case 46:
        return 'Brigade';
      case 47:
        return 'Major General';
      case 48:
        return 'Lt General';
      case 49:
        return 'General';
      case 50:
        return 'Commander';
      case 51:
        return 'HERO';
    }
  }

  public function clan($numero)
  {
    $i = $numero;
    switch ($i) {
      case 0:
        return "Newbie";

      case 1:
        return "Trainee";

      case 2:
        return "Trainee";

      case 3:
        return "Novice";

      case 4:
        return "Novice";

      case 5:
        return "Support";

      case 6:
        return "Support";

      case 7:
        return "Support";

      case 8:
        return "Excellent";

      case 9:
        return "Excellent";

      case 10:
        return "Excellent";

      case 11:
        return "Blackfoot";

      case 12:
        return "Blackfoot";

      case 13:
        return "Blackfoot";

      case 14:
        return "Spearhead";

      case 15:
        return "Spearhead";

      case 16:
        return "Spearhead";

      case 17:
        return "Spearhead";

      case 18:
        return "Spearhead";

      case 19:
        return "Recon Regiment";

      case 20:
        return "Recon Regiment";

      case 21:
        return "Recon Platoon";

      case 22:
        return "Recon Platoon";

      case 23:
        return "Commando Squad";

      case 24:
        return "Commando Squad";

      case 25:
        return "Commando Platoon";

      case 26:
        return "Commando Platoon";

      case 27:
        return "Commando Battalion";

      case 28:
        return "Commando Battalion";

      case 29:
        return "Commando Company";

      case 30:
        return "Commando Company";

      case 31:
        return "Commando Regiment";

      case 32:
        return "Commando Regiment";

      case 33:
        return "Commando Brigade";

      case 34:
        return "Commando Brigade";

      case 35:
        return "SpecOps Company";

      case 36:
        return "SpecOps Company";

      case 37:
        return "SpecOps Regiment";

      case 38:
        return "SpecOps Regiment";

      case 39:
        return "SpecOps Brigade";

      case 40:
        return "SpecOps Brigade";

      case 41:
        return "SpecOps Platoon";

      case 42:
        return "SpecOps Platoon";

      case 43:
        return "BlackOps Regiment";

      case 44:
        return "BlackOps Regiment";

      case 45:
        return "BlackOps Platoon";

      case 46:
        return "BlackOps Platoon";

      case 47:
        return "BlackOps Brigade";

      case 48:
        return "BlackOps Brigade";

      case 49:
        return "BlackOps Squad";

      case 50:
        return "BlackOps Regiment ";
    }
  }
}

class Features
{
  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }
  /**
   *   
   *|--------------------------------------------------------------------------
   *| PLAYERS FASE
   *|--------------------------------------------------------------------------
   **/
  public function bestFivePlayers()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name<>'' AND ban_obj_id='0' AND rank>'5' AND access_level != '-1' ORDER BY exp DESC LIMIT 5");
    $sth->execute();
    $i = 0;
    while ($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $i++;
      if ($i == 1) {
        echo '<div class="champion">
        <p class="nick">' . $res["player_name"] . '</p>
        <p class="rank"><img src="/template/images/ranks/icon/' . $res["rank"] . '.png"> ' . number_format($res["exp"]) . '</p>
      </div>
      <div class="grade">';
      } else {
        echo '<p>
                <span class="nick second">' . $res["player_name"] . '</span>
                <span class="exp"><img src="/template/images/ranks/icon/' . $res["rank"] . '.png"> ' . number_format($res["exp"]) . '</span>
              </p>';
      }
    }
    echo '</div>';
  }

  private function rankAllPlayersCount($Type = "exp")
  {
    if ($Type == "kda") {
      $Query = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name<>'' AND rank>'5' AND access_level != '-1' ORDER BY kills_count DESC, deaths_count DESC");
    } else {
      $Query = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name<>''  AND rank>'5' AND access_level != '-1' ORDER BY exp DESC");
    }
    $Query->execute();
    return ceil($Query->rowCount() / 20);
  }

  public function rankAllPlayersType($Keyword = "exp")
  {
    switch ($Keyword) {
      case "exp":
        return '<th class="last">XP</th>';
      case "kda":
        return '<th class="last">KDA</th>';
      default:
        return '<th class="last">XP</th>';
    }
  }

  public function rankAllPlayers($Limit, $Search, $Type = "exp")
  {
    $Addons = new Addons();
    if (isset($Search)) {
      if ($Type == "kda") {
        $RankGeral = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name like :Ss AND rank>'5' AND access_level != '-1' ORDER BY kills_count DESC, deaths_count DESC LIMIT 20 OFFSET '$Limit'");
      } else {
        $RankGeral = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name like :Ss AND rank>'5' AND access_level != '-1' ORDER BY exp DESC LIMIT 20 OFFSET '$Limit'");
      }
      $RankGeral->execute([':Ss' => "%$Search%"]);
    } else {
      if ($Type == "kda") {
        $RankGeral = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name<>'' AND rank>'5' AND access_level != '-1' ORDER BY kills_count DESC, deaths_count DESC LIMIT 20 OFFSET '$Limit'");
      } else {
        $RankGeral = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank < '53' AND player_name<>'' AND rank>'5' AND access_level != '-1' ORDER BY exp DESC LIMIT 20 OFFSET '$Limit'");
      }
      $RankGeral->execute();
    }

    $b = 0;
    while ($ResultadosGeral = $RankGeral->fetch(\PDO::FETCH_ASSOC)) {
      $b++;
      $Rank = $ResultadosGeral['rank'];
      $Name = $ResultadosGeral['player_name'];
      $Exp = $ResultadosGeral['exp'];
      $Head = $ResultadosGeral['headshots_count'];
      $Kill = $ResultadosGeral['kills_count'];
      $Death = $ResultadosGeral['deaths_count'];
      $Kda = $Kill + $Death != 0 ? round($Kill / ($Kill + $Death) * 100) : 0;

      $posicao = $b + $Limit;
      echo '<tr class="">
      <td class="rank">' . $posicao . '</td>
      <td class="nick"><a href="javascript:void(0);" onclick="javacript:getDetail(\'1\', \'Rich´\', \'killdeath\');return false;">' . $Name . '</a></td>
      <td class="rank_class">
        <img src="/template/images/ranks/icon/' . $Rank . '.png">' . $Addons->player($Rank) . '
      </td>';
      if ($Type == "kda") echo '<td class="gray">' . number_format($Kill) . '/' . number_format($Death) . '(' . $Kda . '%)</td>';
      else echo '<td class="gray">' . number_format($Exp) . '</td>';
      echo '</tr>';
    }
  }

  public function rankAllPlayersPages($Keyword = null, $Type = "exp")
  {
    $Actual = 1;
    is_null($Type) == true ? $Type = "exp" : $Type = $Type;
    if (!is_null($Keyword) && @$Keyword["page"]) $Actual = $Keyword["page"];
    $Count = $this->rankAllPlayersCount($Type);
    echo '<li class="first"><a href="?type=' . $Type . '&page=1"><span>First</span></a></li>';
    for ($n = 0; $n < $Count && $n <= 10; $n++) {
      if ($Actual == $n + 1) echo '<li class="here"><a href="#">' . ($n + 1) . '</a></li>';
      else echo '<li><a href="?type=' . $Type . '&page=' . ($n + 1) . '">' . ($n + 1) . '</a></li>';
    }
    echo '<li class="last"><a href="?type=' . $Type . '&page=' . $Count . '"><span>Last</span></a></li>';
  }

  /**
   *   
   *|--------------------------------------------------------------------------
   *| CLAN FASE 
   *|--------------------------------------------------------------------------
   **/
  public function bestFiveClans()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM clan_data WHERE owner_id<>0 AND clan_name<>'' ORDER BY pontos DESC LIMIT 5");
    $sth->execute();
    $i = 0;
    while ($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $i++;
      if ($i == 1) {
        echo '<div class="champion">
        <p class="nick">' . $res["clan_name"] . '</p>
        <p class="rank">' . number_format($res["pontos"]) . '</p>
      </div>
      <div class="grade">';
      } else {
        echo '<p>
        <span class="nick second">' . $res["clan_name"] . '</span>
        <span class="exp">' . number_format($res["pontos"]) . '</span>
      </p>';
      }
    }
    echo '</div>';
  }

  private function rankAllClansCount()
  {
    $Query = $this->Conn->prepareCM("SELECT * FROM clan_data WHERE owner_id<>0 AND clan_name<>'' ORDER BY clan_exp DESC");
    $Query->execute();
    return ceil($Query->rowCount() / 20);
  }

  public function rankAllClans($Limit, $Search)
  {
    $Addons = new Addons();
    if (isset($Search)) {
      $RankGeral = $this->Conn->prepareCM("SELECT * FROM clan_data WHERE owner_id<>0 AND clan_name = :Ss ORDER BY clan_exp DESC LIMIT 20 OFFSET '$Limit'");
      $RankGeral->execute([':Ss' => "%$Search%"]);
    } else {
      $RankGeral = $this->Conn->prepareCM("SELECT * FROM clan_data WHERE owner_id<>0 AND clan_name<>'' ORDER BY clan_exp DESC LIMIT 20 OFFSET '$Limit'");
      $RankGeral->execute();
    }
    $b = 0;
    while ($ResultadosGeralClan = $RankGeral->fetch(\PDO::FETCH_ASSOC)) {
      $b++;
      $Rank = $ResultadosGeralClan['clan_rank'];
      $Name = $ResultadosGeralClan['clan_name'];
      $Exp =  $ResultadosGeralClan['clan_exp'];
      $Win =  $ResultadosGeralClan['vitorias'];
      $Lose = $ResultadosGeralClan['derrotas'];
      $Total = $ResultadosGeralClan['partidas'];
      $Pontos =  $ResultadosGeralClan['pontos'];
      $KD = $Total != 0 ? round(($Win * 100) / $Total, 1) : 0;
      $posicao = $b + $Limit;
      echo '<tr>
      <td class="rank">' . $posicao . ' <p class="rank_same"></p>
        <p></p>
      </td>
      <td class="nick">' . $Name . '</td>
      <td class="master">' . $Addons->clan($Rank) . '</td>
      <td class="red">' . number_format($Exp) . '</td>
      <td class="red">%' . $KD . '</td>
      <td class="gray">' . number_format($Pontos) . '</td>
    </tr>';
    }
  }

  public function rankAllClansPages($Keyword = null)
  {
    $Actual = 1;
    if (!is_null($Keyword) && @$Keyword["page"]) $Actual = $Keyword["page"];
    $Count = $this->rankAllClansCount();
    echo '<li class="first"><a href="?page=1"><span>First</span></a></li>';
    for ($n = 0; $n < $Count && $n <= 10; $n++) {
      if ($Actual == $n + 1) echo '<li class="here"><a href="#">' . ($n + 1) . '</a></li>';
      else echo '<li><a href="?page=' . ($n + 1) . '">' . ($n + 1) . '</a></li>';
    }
    echo '<li class="last"><a href="?page=' . $Count . '"><span>Last</span></a></li>';
  }
}

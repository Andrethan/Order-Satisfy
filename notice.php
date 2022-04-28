<?php
    require_once "config.php";
    $Row = mysqli_fetch_assoc(mysqli_query($link, "SELECT `id`, `name`, `surname` FROM `users`"));
  $_SESSION['USER_NAME'] = $Row['name'];
  $_SESSION['USER_ID'] = $Row['id'];
  $_SESSION['USER_LOGIN_IN'] = 1;

  $Page = 'notice';
  $Module = 'notice';
  /*if($_SERVER['REQUEST_URI'] == '/'){
    $Page = 'notice';
    $Module = 'notice';
  }*/ if(!$_SERVER['REQUEST_URI'] == '/') {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, ' /'));
    $Page = array_shift($URL_Parts);
  }
  if(!empty($Module)){
    $Param = array();
    for($i = 0; $i < count($URL_Parts); $i++){
      $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
    }
  }
  
  ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $Count = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(`id`) FROM `notice` WHERE `uid` = $_SESSION[USER_ID]"));
    if($Module){
        $Module = 1;
        $Result = mysqli_query($link, "SELECT `id`, `status`, `date`, `text` FROM `notice` WHERE `uid` = $_SESSION[USER_ID] ORDER BY `id` DESC LIMIT 0, 5");    
    } else {
        $Start = ($Module -1) * 5;
        $Result = mysqli_query($link, str_replace('START', $Start, "SELECT `id`, `status`, `date`, `text` FROM `notice` WHERE `uid` = $_SESSION[USER_ID] ORDER BY `id` DESC LIMIT START, 5"));
    }

    while($Row = mysqli_fetch_assoc($Result)){
        if($Row['status']) $Status = 'Readed';
        else $Status = 'Not readed';
        
        echo '<a href="/'.$Row['id'].'"><div class="ChatBlock"><span>'.$Status.' ' .$Row['date'].'</span>'.$Row['text'].'</div></a>';
    }
?>
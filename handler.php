<?php

    if (isset($_GET['ping'])) {
      $shellResult = shell_exec("ping -c 1 " . $_GET['ping']);

      if (!$shellResult) {
        echo 'Mất kết nối!';
        exit;
      }

      $result = explode('time=', preg_split("/\r|\n/", $shellResult)[1])[1] ?? null;
      if (!$result) {
        echo 'Mất kết nối!<br>';
        echo $shellResult;
      }

      echo 'Ping thông: ' .  $result;
    }
?>

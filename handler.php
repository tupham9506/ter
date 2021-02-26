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
      exit;
    }

    if (isset($_GET['port'])) {
      $shellResult = shell_exec('sudo lsof -i:' . $_GET['port']);
      $shellResultArray = preg_split("/\r|\n/", $shellResult);
      $processArray = [];
      for($i = 1; $i < count($shellResultArray); $i++) {
        if (!$shellResultArray[$i]) {
          continue;
        }
        $processDetail = preg_split("/\s+/", $shellResultArray[$i]);
        $processArray[] = [
          'COMMAND' => $processDetail[0],
          'PID' => $processDetail[1]
        ];
      }
      echo json_encode($processArray);
      exit;
    }

    if (isset($_GET['kill_port'])) {
      shell_exec('sudo kill ' . $_GET['kill_port']);
      exit;
    }

    if (isset($_GET['kill_all_port'])) {
      shell_exec('sudo killall -9 node');
      exit;
    }

    if (isset($_GET['shutdown'])) {
      shell_exec('sudo shutdown -h now');
      exit;
    }

    if (isset($_GET['restart'])) {
      shell_exec('sudo reboot');
      exit;
    }
?>

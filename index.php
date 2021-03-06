<!DOCTYPE html>
<html>
<head>
  <title>Terminal</title>
  <link rel="stylesheet" type="text/css" href="libs/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="card w-100">
        <div class="card-body">
          <div class="col-12">
            Mã nguồn: <?php echo shell_exec('pwd'); ?>
          </div>
          <div class="col-12">
            Author: tupb
          </div>
          <div class="col-12">
            <?php
              $exceptIp = '192.168.1.255';
              $myIp = str_replace($exceptIp, '', shell_exec('ifconfig | grep 192'));
              if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $myIp, $ip_match)) {
                 echo 'My IP: ' . $ip_match[0];
              }
            ?>
          </div>
        </div>
      </div>
      <div class="card w-100">
        <div class="card-body">
          <div class="col-12" id="ping-fx">
            <div class="row">
              <div class="col-2">
                Kiểm tra Ping
              </div>
              <div class="col-6">
                <input type="text" value="google.com" class="form-control">
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-default submit">Submit</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="result"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card w-100">
        <div class="card-body">
          <div class="col-12" id="port-fx">
            <div class="row">
              <div class="col-2">
                Kiểm tra port
              </div>
              <div class="col-6">
                <input type="text" class="form-control" placeholder="Example 3000">
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-default submit">Submit</button>
                <button type="button" id="kill-all-port" class="btn btn-danger float-right">Kill all process</button>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <div class="result">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Command</th>
                        <th>Process ID</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card w-100">
        <div class="card-body">
          <div class="col-12" id="port-fx">
            <button type="button" id="open-home-folder" class="btn btn-default mr-5">Mở thư mục home</button>
            <!-- <button type="button" id="empty-trash-fx" class="btn btn-danger mr-5">Làm trống thùng rác</button> -->
          </div>
        </div>
      </div>
      <div class="card w-100" id="system-ctrl">
        <div class="card-body">
          <button type="button" id="restart-fx" class="btn btn-warning mr-5">Khởi động lại</button>
          <button type="button" id="shutdown-fx" class="btn btn-danger">Tắt máy ngay</button>
        </div>
      </div>
    </div>
  </div>
  <br>
<script src="libs/jquery-3.5.1.min.js"></script>
<script src="libs/bootstrap/bootstrap.min.js"></script>
<script src="libs/bootstrap/popper.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>

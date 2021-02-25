<!DOCTYPE html>
<html>
<head>
  <title>Terminal</title>
  <link rel="stylesheet" type="text/css" href="libs/bootstrap/bootstrap.min.css">
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
                Ping
              </div>
              <div class="col-6">
                <input type="text" value="google.com" class="form-control">
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-default">Send</button>
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
    </div>
  </div>
  <br>
<script src="libs/jquery-3.5.1.min.js"></script>
<script src="libs/bootstrap/bootstrap.min.js"></script>
<script src="libs/bootstrap/popper.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Google ping
    $('#ping-fx button').click(function(event){
      request({
        ping: $('#ping-fx input').val()
      }).then(function(result){
        $('#ping-fx .result').html(result)
      }).catch(function(err){

      });
    });
    $('#ping-fx button').trigger('click');
  });

  // Common function
  function request (data) {
    return new Promise(function(resolve, reject){
      $.ajax({
        method: "GET",
        url: "handler.php",
        data: data
      })
      .done(function( msg ) {
        resolve(msg);
      });
    })
  }

</script>
</body>
</html>

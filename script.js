$(document).ready(function(){
  // Google ping
  $('#ping-fx .submit').click(function(event) {
    request({
      ping: $('#ping-fx input').val()
    }).then(function(result){
      $('#ping-fx .result').html(result)
    }).catch(function(err){

    });
  });
  $('#ping-fx .submit').trigger('click');

  // Port check
  $('#port-fx .submit').click(function(event) {
    request({
      port: $('#port-fx input').val()
    }).then(function(result){
      result = JSON.parse(result);

      var str = '';
      for(var i in result) {
        str += '<tr>';
        str += '<td>' + result[i]['COMMAND'] + '</td>';
        str += '<td>' + result[i]['PID'] + '</td>';
        str += '<td><button type="button" class="btn btn-danger kill" data="' + result[i]['PID'] + '">Kill</td>'
        str += '</tr>';
      }

      $('#port-fx .result tbody').html(str)
    }).catch(function(err){

    });
  });

  $(document).on('click', '#port-fx .kill', function(){
    var pid = $(this).attr('data');
    request({
      kill_port: pid
    }).then(function(result){
      $('#port-fx button').trigger('click');
    }).catch(function(err){

    });
  })

  $('#shutdown-fx').click(function (event) {
    request({
      shutdown: true
    })
  })

  $('#restart-fx').click(function (event) {
    request({
      restart: true
    })
  });
});

$('#kill-all-port').click(function(e){
  request({
    kill_all_port: true
  })
})

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
$('#submit').click(function (e) {
  e.preventDefault();
  $('#error').html('<img width="200px" heigth="50px" src="load.gif" >');
  var email,msg,checkBox = false
  email = $('#email').val()
  msg = $('#msg').val()
  if ($('#check').is(':checked')) {
    checkBox = true
  }
  $.ajax({
    type: 'POST',
    url: 'contact.php',
    data: {'email': email,'message': msg,'checkBox': checkBox},
    success: function (m) {
      $('#error').html('<p>'+m+'<p>')
    },
    error: function () {
       $('#error').html('<p>process failed</p>')
    }

  })
})

$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/music',
        type: 'GET'
      })
      .done(function(data){
          $.each(data, function(){
              
          })
      })
      .fail(function(params) {
          console.log(params[0])
      })
})
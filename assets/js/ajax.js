$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/music',
        type: 'GET'
      })
      .done(function(data){
          $.each(data, function(){
              $(".music-dom").append(function(){
                  `
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="border-bottom pb-3">
                            <div class="row">
                                <div class="col-sm-5 pr-2">
                                <div class="rotate-img">
                                    <img src="assets/images/dashboard/home_19.jpg" alt="thumb"
                                    class="img-fluid w-100" />
                                </div>
                                </div>
                                <div class="col-sm-7 pl-2">
                                <p class="fs-16 font-weight-600 mb-0">
                                    Online shopping ..
                                </p>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">Photo </span>10 Minutes ago
                                </p>
                                <p class="mb-0 fs-13">
                                    Lorem Ipsum has been
                                </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                  `
              })
          })
      })
      .fail(function(params) {
          console.log(params[0])
      })
})
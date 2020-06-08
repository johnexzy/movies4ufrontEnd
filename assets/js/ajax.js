$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/music/limit/4',
        type: 'GET',
        beforeSend: () =>{
            //do some stuff
        }
      })
      .done((data) => {
          $.each(data, (key, music) => {

                      $("#music-dom").append(
                  `
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="border-bottom pb-3">
                            <div class="row">
                                <div class="col-sm-5 pr-2">
                                <div class="rotate-img">
                                    <img src="http://127.0.0.1:8090/${music.images[0]}" alt="thumb"
                                    class="img-fluid w-100" />
                                </div>
                                </div>
                                <div class="col-sm-7 pl-2">
                                <p class="fs-16 font-weight-600 mb-0">
                                    ${music.music_name}
                                </p>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">${music.artist} </span>10 Minutes ago
                                </p>
                                
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                  `
              
                  )
                  
          })
      })
      .fail((params) => {
          alert(params)
      })
      $.ajax({
        url: 'http://127.0.0.1/8090/api/v1/album/limit/5',
        type: 'GET',
        beforeSend: () => {
            // do some stuff
        }
      })
      .done((data) => {
          $.each(data, (key, album)=>{
              
          })
      })
})
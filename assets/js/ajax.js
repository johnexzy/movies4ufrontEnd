$(function(){
    let music = $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/music/limit/4',
        type: 'GET',
        beforeSend: () =>{
            //do some stuff
        }
      })
      .done((data) => {
        $(".music-loader").hide()
          $.each(data, (key, music) => {
            console.log(key)
                      $("#music-dom").append(
                  `
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="border-bottom pb-3">
                            <div class="row">
                                <div class="col-sm-7 pr-2">
                                <div class="rotate-img">
                                    <img src="http://127.0.0.1:8090/${music.images[0]}" alt="thumb"
                                    class="img-fluid w-100" />
                                </div>
                                </div>
                                <div class="col-sm-12 pl-2">
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
      let album = $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/album/limit/10',
        type: 'GET',
        beforeSend: () => {
            // do some stuff
        }
      })
      .done(function(albums){
        $(".album-loader").hide()
          $.each(albums, function(key, album){
              console.log(album);
              (key == 0) ?
              $(".album-latest").append(`
              <a href="">
              <div class="rotate-img">
                <img src="http://127.0.0.1:8090/${album.images[0]}" alt="thumb" class="img-fluid" />
              </div>
              
              <h2 class="mt-3 text-primary mb-2">
                ${album.album_name}
              </h2>
              </a>
              <p class="fs-13 mb-1 text-muted">
              10 Minutes ago
              </p>
              <p class="my-3 fs-15">
              ${album.album_details}
              </p>
              <a href="#" class="font-weight-600 fs-16 text-dark">Read more</a>
              `)
              :
              $(".album-other").append(`
              <div class="border-bottom pb-3 mb-3">
              <a href="" style="text-decoration:none">
              <h3 class="font-weight-600 mb-0">
                ${album.album_name}
              </h3>
              </a>
              <p class="fs-13 text-muted mb-0">
                <span class="mr-2">Photo </span>10 Minutes ago
              </p>
              <p class="mb-0">
                ${album.album_details}
              </p>
            </div>
              `)
          })
      })
})
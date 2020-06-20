$(function(){
  let movies = $.ajax({
    url: 'http://127.0.0.1:8090/api/v1/videos/9',
    type: 'GET',
    beforeSend:()=>{

    }
  })
  .done((data)=>{
    $.each(data, (key, video)=>{
      key == 0 || key == 1 ? $(".first-half-newvideo").append(`
      <div class="col-sm-6 grid-margin">
        <div class="position-relative">
          <a href="/view/movies/${video.short_url}" style="text-decoration:none; color: inherit">
            <div class="rotate-img">
              <img src="http://127.0.0.1:8090/${video.images[0]}" alt="thumb" class="img-fluid" />
            </div>
          </a>
          <div class="badge-positioned w-90">
            <div class="d-flex justify-content-between align-items-center">
              <span class="badge badge-danger font-weight-bold">${video.category}</span>
              <div class="video-icon">
                <i class="mdi mdi-play"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    `)
    : key == 2 || key == 3 ? $(".second-half-newvideo").append(`
    <div class="col-sm-6 grid-margin">
      <div class="position-relative">
        <a href="/view/movies/${video.short_url}" style="text-decoration:none; color: inherit">
          <div class="rotate-img">
            <img src="http://127.0.0.1:8090/${video.images[0]}" alt="thumb" class="img-fluid" />
          </div>
        </a>
        <div class="badge-positioned w-90">
          <div class="d-flex justify-content-between align-items-center">
            <span class="badge badge-danger font-weight-bold">${video.category}</span>
            <div class="video-icon">
              <i class="mdi mdi-play"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  `) : $(".other-newvideo").append(`
            <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                <div class="div-w-80 mr-3">
                  <a href="/view/movies/${video.short_url}" style="text-decoration:none; color: inherit">
                    <div class="rotate-img">
                      <img src="http://127.0.0.1:8090/${video.images[0]}" alt="thumb" class="img-fluid" />
                    </div>
                  </a>
                </div>
                <h3 class="font-weight-600 mb-0">
                  <a href="/view/movies/${video.short_url}" style="text-decoration:none; color: inherit">
                  ${video.video_name}
                  </a>
                </h3>
            </div>
        `)
    })
    
    
  })
  .fail(err => alert(err))
    let music = $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/music/limit/8',
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
                    
                  <div class="border-bottom pb-3 mb-3">
                  <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                  <h3 class="font-weight-600 mb-0">
                    ${music.music_name}
                  </h3>
                  </a>
                  <p class="L5 mb-0">
                    <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">${music.artist}</span>
                  </p>
                  <p class="mb-0">
                    ${music.music_details.substring(0, 100)}...
                  </p>
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
              
              $(".album-other").append(`
              <div class="border-bottom pb-3 mb-3">
              <a href="/view/albums/${album.short_url}" style="text-decoration:none; color:inherit">
              <h3 class="font-weight-600 mb-0">
                ${album.album_name}
              </h3>
              </a>
              <p class="L5 mb-0">
                    <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">${album.artist}</span>
                  </p>
                  <p class="mb-0">
                    ${album.album_details.substring(0, 100)}...
                  </p>
            </div>
              `)
          })
      })
})
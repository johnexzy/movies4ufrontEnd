$(function(){
  let movies = $.ajax({
    url: 'http://127.0.0.1:8090/api/v1/videos/limit/9',
    type: 'GET',
    beforeSend:()=>{

    }
  })
  .done((data)=>{
    $.each(data, (key, video)=>{
      key == 0 || key == 1 ? $(".first-half-newvideo").append(`
      <div class="col-sm-6 grid-margin">
        <div class="position-relative">
          <div class="rotate-img">
            <img src="127.0.0.1:8090/${video.images[0]}" alt="thumb" class="img-fluid" />
          </div>
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
        <div class="rotate-img">
          <img src="127.0.0.1:8090/${video.images[0]}" alt="thumb" class="img-fluid" />
        </div>
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
  `) : ''
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
                  <a href="" style="text-decoration:none; color: inherit">
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
              <a href="" style="text-decoration:none; color:inherit">
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
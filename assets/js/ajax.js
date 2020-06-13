$(function(){
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
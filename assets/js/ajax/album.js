$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/album',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        $(".show-album").html("")
        $.each(data, (key, album)=>{
            $(".show-album").append(`
            <div class="row">
            <div class="col-sm-4 grid-margin">
              <div class="rotate-img">
              
                <img
                  src="http://127.0.0.1:8090/${album.images[0]}"
                  alt="banner"
                  class="img-fluid"
                />
              </div>
            </div>
            <div class="col-sm-8 grid-margin">
              <h2 class="font-weight-600 mb-2">
                ${album.album_name}
              </h2>
              <p class="fs-13 text-muted mb-0">
                <span class="mr-2">Release Year: </span>${album.year}
              </p>
              <p class="fs-15">
                ${album.album_details}
              </p>
            </div>
          </div>
            `)
        })
    })
    .fail((err)=>{

    })
})
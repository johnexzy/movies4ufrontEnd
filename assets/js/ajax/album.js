$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/album/pages/1',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        $(".show-album").html("")
        $.each(data.data, (key, album)=>{
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
        // $(".pagination").html("")
        data.links.prev == null ?
        $(".prev").find("#pagelink").val("")
        :
        $(".prev").find("#pagelink").val(`${data.links.prev}`)

        data.links.next == null ?
        $(".next").find("#pagelink").val("")
        :
        $(".next").find("#pagelink").val(`${data.links.next}`)
    })
    .fail((err)=>{

    })
    
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/album/popular/6',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        
        $.each(data, (key, album)=>{
            $(".show-popular").append(`
                    <div class="mb-4">
                        <div class="rotate-img">
                        <img
                            src="http://127.0.0.1:8090/${album.images[0]}"
                            alt="banner"
                            class="img-fluid"
                        />
                        </div>
                        <h3 class="mt-3 font-weight-600">
                        ${album.album_name}
                        </h3>
                        <p class="fs-13 text-muted mb-0">
                        <span class="mr-2">Year Of Release</span>${album.year}
                        </p>
                    </div>
            `)
        })
    })
    .fail((err)=>{

    });
    
    //Control Pagination Using AJAX || FETCH API

})

$(function(){
    
    $(".page-item").on("click", function(){
        // if (!$(this).find("#pagelink")) {
        //     return false
        // }
        // alert("john")
        let link = $(this).find("#pagelink").val();
        // alert(link)
        if (link == "") {
            return false
        }
        $.ajax({
            url: `http://127.0.0.1:8090/api/v1/album/${link}`,
            type: 'GET',
            beforeSend : ()=>{
                $(".show-album").html(`
                    <div class="album-loader">
                        <div class="d-flex justify-content-center">
                            <img src="./assets/images/loader copy.gif" alt="">
                        </div>
                    </div>
                `)
            }
        })
        .done((data)=>{
            $(".show-album").html("")
        $.each(data.data, (key, album)=>{
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
        data.links.prev == null ?
        $(".prev").find("#pagelink").val("")
        :
        $(".prev").find("#pagelink").val(`${data.links.prev}`)

        data.links.next == null ?
        $(".next").find("#pagelink").val("")
        :
        $(".next").find("#pagelink").val(`${data.links.next}`)
        })
        .fail((err)=>{
            console.log(err)
            alert("Something Went Wrong! Try Again")
        })

    })
})
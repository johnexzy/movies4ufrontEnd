$(function(){
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/music/pages/1',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        $(".show-music").html("")
        $.each(data.data, (key, music)=>{
            $(".show-music").append(`
            <div class="row">
            <div class="col-sm-4 grid-margin">
                <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                    <div class="rotate-img">
                        <img
                        src="http://127.0.0.1:8090/${music.images[0]}"
                        alt="banner"
                        class="img-fluid"
                        />
                    </div>
                </a>
            </div>
            <div class="col-sm-8 grid-margin">
                <h2 class="font-weight-600 mb-2">
                    <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                        ${music.music_name}
                    </a>
                </h2>
              
                <p class="L5 mb-0">
                    <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">${music.artist}</span>
                </p>
                <p class="mb-0">
                    ${music.music_details.substring(0, 400)}...
                </p>
            </div>
          </div>
          <hr>
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

        $(".pager").text(`Page ${data.meta.current_page} of ${data.meta.total_pages}`)

    })
    .fail((err)=>{

    })
    
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/music/popular/6',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        
        $.each(data, (key, music)=>{
            $(".show-popular").append(`
                    <div class="mb-4">
                        <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                            <div class="rotate-img">
                                <img
                                    src="http://127.0.0.1:8090/${music.images[0]}"
                                    alt="banner"
                                    class="img-fluid"
                                />
                            </div>
                        </a>                            
                        <h3 class="mt-3 font-weight-600">
                            <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                                ${music.music_name}
                            </a>               
                        </h3>
                        <p class="L5 mb-0">
                            <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">${music.artist}</span>
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
        $(".show-music").html(`
                    <div class="album-loader">
                        <div class="d-flex justify-content-center">
                            <img src="/assets/images/loader copy.gif" alt="">
                        </div>
                    </div>
                `)
        $.ajax({
            url: `http://127.0.0.1:8090/api/v1/music/${link}`,
            type: 'GET',
        })
        .done((data)=>{
            $("body, html").animate({
                scrollTop: 0
            }, 2000)
            $(".show-music").html("")
            $.each(data.data, (key, music)=>{
                $(".show-music").append(`
                <div class="row">
                <div class="col-sm-4 grid-margin">
                    <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit">
                        <div class="rotate-img">
                            <img
                            src="http://127.0.0.1:8090/${music.images[0]}"
                            alt="banner"
                            class="img-fluid"
                            />
                    </a>                    
                </div>
                </div>
                <div class="col-sm-8 grid-margin">
                <h2 class="font-weight-600 mb-2">
                    <a href="/view/music/${music.short_url}" style="text-decoration:none; color: inherit"> 
                        ${music.music_name}
                    </a>
                </h2>
                
                <p class="L5 mb-0">
                    <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">${music.artist}</span>
                  </p>
                  <p class="mb-0">
                    ${music.music_details.substring(0, 100)}...
                </p>
                
                </div>
            </div>
            <hr>
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
            
            $(".pager").text(`Page ${data.meta.current_page} of ${data.meta.total_pages}`)
            })
        

        .fail((err)=>{
            console.log(err)
            alert("Something Went Wrong! Try Again")
        })

    })
})
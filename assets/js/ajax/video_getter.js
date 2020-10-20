$(function(){
    function hoverShadow() {
        $(".music").hover(function(){
            $(this).removeClass("shadow")
            
          }, function(){
            $(this).addClass("shadow")
          })
    }
    $.ajax({
        url: 'http://127.0.0.1:8090/api/v1/videos/pages/1',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        $(".show-video").html("")
        $.each(data.data, (key, video)=>{
            $(".show-video").append(`
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card card-rounded shadow music">
                    <a href="/view/movies/${video.short_url}"
                        class="text-decoration-none">
                        <div class="card-img-holder">
                            <img src="http://127.0.0.1:8090/${video.images[0]}" alt="" class="card-img">
                        </div>
                    </a>
                    
                    <div class="card-body p-2" style="background:#eee;">
                    <a 
                        class="h3 mb-0" 
                        href="/view/movies/${video.short_url}"
                        style="text-decoration:none; color: inherit"
                        >
                        <h3 class="font-weight-200 mb-2" style="color:#561529">
                            (Download MP4) - ${video.video_name}
                        </h3>
                        </a>
                        <div class="d-flex justify-content-between">
                            <p class="d-inline L5 mb-0">
                                <i class="mdi mdi-movie"></i>
                                ${video.category}
                            </p>
                            <p class="d-inline mb-0">
                            <i class="mdi mdi-comment"></i>(${video.comments.length})
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
            `)
        })
        hoverShadow()
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
        url: 'http://127.0.0.1:8090/api/v1/videos/popular/12',
        type: 'GET',
        beforeSend: ()=>{

        }
    })
    .done((data)=>{
        
        
        $.each(data, (key, video)=>{
            $(".show-popular").append(`
                    <div class=" col-sm-3 grid-margin stretch-card">
                        <div class="card card-rounded shadow music">
                        <a href="/view/movies/${video.short_url}"
                            class="text-decoration-none">
                            <div class="card-img-holder">
                                <img src="http://127.0.0.1:8090/${video.images[0]}" alt="" class="card-img">
                            </div>
                        </a>
                        
                        <div class="card-body p-2" style="background:#eee;">
                        <a 
                            class="h3 mb-0" 
                            href="/view/movies/${video.short_url}"
                            style="text-decoration:none; color: inherit"
                            >
                            <h3 class="font-weight-200 mb-2" style="color:#561529">
                                (Download MP4) - ${video.video_name}
                            </h3>
                            </a>
                            <!--
                                <div class="d-flex justify-content-between">
                                    <p class="d-inline L5 mb-0">
                                        <i class="mdi mdi-movie"></i>
                                        ${video.category}
                                    </p>
                                    <p class="d-inline mb-0">
                                    <i class="mdi mdi-comment"></i>(${video.comments.length})
                                    </p>
                                </div>
                            -->
                        </div>
                        </div>
                    </div>
            `)
        })
        hoverShadow()
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
        $(".show-video").html(`
                    <div class="album-loader">
                        <div class="d-flex justify-content-center">
                            <img src="/assets/images/loader.gif" alt="">
                        </div>
                    </div>
                `)
        $.ajax({
            url: `http://127.0.0.1:8090/api/v1/videos/${link}`,
            type: 'GET',
        })
        .done((data)=>{
            $("body, html").animate({
                scrollTop: 0
            }, 2000)
            $(".show-video").html("")
            $.each(data.data, (key, video)=>{
                $(".show-video").append(`
                    <div class="col-md-1 grid-margin stretch-card">
                        <div class="card card-rounded shadow music">
                        <a href="/view/movies/${video.short_url}"
                            class="text-decoration-none">
                            <div class="card-img-holder">
                                <img src="http://127.0.0.1:8090/${video.images[0]}" alt="" class="card-img">
                            </div>
                        </a>
                        
                        <div class="card-body p-2" style="background:#eee;">
                        <a 
                            class="h3 mb-0" 
                            href="/view/movies/${video.short_url}"
                            style="text-decoration:none; color: inherit"
                            >
                            <h3 class="font-weight-200 mb-2" style="color:#561529">
                                (Download MP4) - ${video.video_name}
                            </h3>
                            </a>
                            <div class="d-flex justify-content-between">
                                <p class="d-inline L5 mb-0">
                                    <i class="mdi mdi-movie"></i>
                                    ${video.category}
                                </p>
                                <p class="d-inline mb-0">
                                <i class="mdi mdi-comment"></i>(${video.comments.length})
                                </p>
                            </div>
                        </div>
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
            
            $(".pager").text(`Page ${data.meta.current_page} of ${data.meta.total_pages}`)
            })
            hoverShadow()

        .fail((err)=>{
            console.log(err)
            alert("Something Went Wrong! Try Again")
        })

    })
    
})
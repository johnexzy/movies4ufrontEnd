$(function () {

    fetch('http://127.0.0.1:8090/api/v1/music/pages/1')
        .then(res => res.json())
        .then(data => {
            $(".show-music").html("")
            $.each(data.data, (key, music) => {
                $(".show-music").append(`
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card card-rounded shadow music">
                        <a href="/view/music/${music.short_url}"
                            class="text-decoration-none">
                            <div class="card-img-holder">
                                <img src="http://127.0.0.1:8090/${music.images[0]}" alt="" class="card-img">
                            </div>
                        </a>
                        
                        <div class="card-body p-2" style="background:#eee;">
                        <a 
                            class="h3 mb-0" 
                            href="/view/music/${music.short_url}"
                            style="text-decoration:none; color: inherit"
                            >
                            <h3 class="font-weight-200 mb-2" style="color:#561529">
                                (Download MP3) - ${music.music_name}
                            </h3>
                            </a>
                            <div class="d-flex justify-content-between">
                                <p class="d-inline L5 mb-0">
                                    <i class="mdi mdi-artist"></i>
                                    <a 
                                        href="/view/search/${music.artist}"
                                        target="_blank" 
                                        class="fs-15 text-muted text-decoration-none">
                                        ${music.artist}
                                        </a>
                                </p>
                                <p class="d-inline mb-0">
                                <i class="mdi mdi-comment"></i>(${music.comments.length})
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


    fetch('http://127.0.0.1:8090/api/v1/music/popular/20')
        .then(res => res.json())
        .then(data => {
            // alert("ys")
            console.log(data)
            $.each(data, (key, music) => {
                $(".show-popular").append(`
                
                    <a 
                    class="h3 font-weight-200 mb-1" 
                    href="/view/music/${music.short_url}"
                    style="text-decoration:none; color: inherit"
                    >
                        <div
                        class="d-flex justify-content-start border-bottom mt-2 mb-2 shadow" 
                        style="cursor:pointer"
                        >
                            <h4 class=" d-inline font-weight-200 mb-0">
                                <img src="http://127.0.0.1:8090/${music.images[0]}" style="width:60px; height:60px" alt="" class="card-img d-inline">
                                <p class="d-inline ml-1 font-weight-bold text-primary">Download (MP3) - ${music.music_name}</p>
                            </h4>
                        
                        </div>
                    </a>
                `)
            })
            hoverShadow()
        })

    //Control Pagination Using AJAX || FETCH API

})

$(function () {

    $(".page-item").on("click", function () {
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
                            <img src="/assets/images/loader.gif" alt="">
                        </div>
                    </div>
                `)
        $.ajax({
            url: `http://127.0.0.1:8090/api/v1/music/${link}`,
            type: 'GET',
        })
            .done((data) => {
                $("body, html").animate({
                    scrollTop: 0
                }, 2000)
                $(".show-music").html("")
                $.each(data.data, (key, music) => {
                    $(".show-music").append(`
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card card-rounded shadow music">
                        <a href="/view/music/${music.short_url}"
                            class="text-decoration-none">
                            <div class="card-img-holder">
                                <img src="http://127.0.0.1:8090/${music.images[0]}" alt="" class="card-img">
                            </div>
                        </a>
                        
                        <div class="card-body p-2" style="background:#eee;">
                        <a 
                            class="h3 mb-0" 
                            href="/view/movies/${music.short_url}"
                            style="text-decoration:none; color: inherit"
                            >
                            <h3 class="font-weight-200 mb-2" style="color:#561529">
                                (Download MP3) - ${music.music_name}
                            </h3>
                            </a>
                            <div class="d-flex justify-content-between">
                                <p class="d-inline L5 mb-0">
                                    <i class="mdi mdi-artist"></i>
                                    <a 
                                        href="/view/search/${music.artist}"
                                        target="_blank" 
                                        class="fs-15 text-muted text-decoration-none">
                                        ${music.artist}
                                        </a>
                                </p>
                                <p class="d-inline mb-0">
                                <i class="mdi mdi-comment"></i>(${music.comments.length})
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                `)
                })
                hoverShadow()
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


            .fail((err) => {
                console.log(err)
                alert("Something Went Wrong! Try Again")
            })

    })
})
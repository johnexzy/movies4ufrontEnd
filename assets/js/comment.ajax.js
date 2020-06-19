$(document).ready(function() {
    $('#handleSubmit').on('click', function() {
      let key = $('#commentKey').val();
      let name = $('#name').val();
      let comment = $('#comment').val();
      if (comment == "") {
        return false;
      }
      if (name == "") {
        name = "Anonymous"
      }
      let res;
      $.ajax({
          url: `http://127.0.0.1:8090/api/v1/comment?name=${name}&comment=${comment}&comment_key=${key}`,
          type: 'GET'
        })
        .done(function(data) {
          var comments = '';
          $(".comment-section").append(`
            <div class="comment-box mb-0">
                <div class="d-flex align-items-center">
                    <div class="rotate-img">
                        <img src="../../assets/images/faces/face3.jpg" alt="banner" class="img-fluid img-rounded mr-3">
                    </div>
                    <div>
                        <p class="fs-12 mb-1 line-height-xs">
                            ${data[data.length - 1].updated_at}
                        </p>
                        <p class="fs-16 font-weight-600 mb-0 line-height-xs">
                            ${data[data.length - 1].name}
                        </p>
                    </div>
                </div>

                <p class="fs-12 mt-3">
                    ${data[data.length - 1].comment}
                </p>
            </div>
          `)
            // data.forEach(elem => {
            //   comments +=
            //     '<li class="comment-li card">' +
            //     '<div>' +
            //     '<figure class="comment-avatar">' +
            //     '<img src="../../assets/img/avatar.png" alt="">' +
            //     '</figure>' +
            //     '<address>By <a href="#">' + elem['name'] + '</a>' +
            //     '</address>' +
            //     '<time class="comment-time">' + elem['created_at'] + ' </time>' +
            //     '<div class="comment-content">' +
            //     elem['comment'] +
            //     '</div>' +
            //     '</div>' +
            //     '</li>'
            // });
            // $(".comment-ui").html(comments);
  
          $('#comment').val("")
          $('#name').attr("disabled", "");
          $('body,html').animate({
            scrollTop: 2000
          }, 1000);
        })
        .fail(function(err) {
          // console.log(err);
          alert("failed to add Comment");
        })
    })
  })
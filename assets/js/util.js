$(function(){
  $(".movieLink").on("click", function () {
    let link = $(this).find("input").val();
    window.location = link
  })
  
  $(".searchButton").on("click", function(){
    if ($(".searchInput").val().length > 3) {
      window.location = encodeURI(`http://localhost:3003/view/search/${$(".searchInput").val()}`)
      return false;
    }
    alert("Search Value too small")
    $(".searchInput").focus()
    return false
  })
  $(".music").hover(function(){
    $(this).removeClass("shadow")
    
  }, function(){
    $(this).addClass("shadow")
  })

})
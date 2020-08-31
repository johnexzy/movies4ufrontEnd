$(".movieLink").on("click", function () {
  let link = $(this).find("input").val();
  window.location = link
})

$(".searchButton").on("click", function(){
  if ($(".searchInput").val().length > 3) {
    let link = encodeURI($(".searchInput").val())
    window.location = encodeURI(`http://localhost:3003/view/search/${link}`)
    return false;
  }
  alert("Search Value too small")
  $(".searchInput").focus()
  return false
})
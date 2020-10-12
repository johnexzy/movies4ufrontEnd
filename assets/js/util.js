$(function(){
  /**
   * Submits the search query
   */
  function submitSearch() {
    if ($(".searchInput").val().length > 3) {
      let query = $(".searchInput").val();
      query = query.trim();
      
      window.location = encodeURI(`/view/search/${query}`)
      return false;
    }
    alert("Search Value too small")
    $(".searchInput").trigger('focus');
    return false
  }
  
  $(".searchInput").on("keydown", function(event){
    
    if (event.key == "Enter") {
      submitSearch()
    }
  })
  $(".searchButton").on("click", function(){
    submitSearch();
  })
})
function hoverShadow() {
  $(".music").hover(function(){
      $(this).removeClass("shadow")
      
    }, function(){
      $(this).addClass("shadow")
    })
}
hoverShadow()
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
  $(".searchButton").on("click", submitSearch)
})
function hoverShadow() {
  $(".music").hover(function(){
      $(this).removeClass("shadow")
      
    }, function(){
      $(this).addClass("shadow")
    })
}
function SharePost(phead, ptext){
  // console.log(phead+"\n"+ptext)
  if(navigator.share){
     //alert(phead)
      navigator.share({
          title:  phead,
          text: ptext,
          url: window.location.href
      }).then(()=>{
          alert('Thanks for Sharing');
      }).catch(err =>{
          alert('Couldnt share');
      });
  }
  else{
      alert('Web Share not suprted');
  }
};
hoverShadow()
$(".movieLink").on("click", function () {
  let link = $(this).find("input").val();
  window.location = link
})
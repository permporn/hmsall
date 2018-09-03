$(function() {

$.ajax({
    type: "POST",
    url: "header_request_book.php",
    success: function(data){
        //console.log(data);
        $(".header").html(data);
    } 
});

$('.book_store_list').click(function(){
  $.ajax({
      type: "POST",
      url: "header_book_store.php",
      success: function(data){
          //console.log(data);
          $(".header").html(data);
      } 
  });
});

$('.book_store').click(function(){
  $.ajax({
      type: "POST",
      url: "header_book_store_branch.php",
      success: function(data){
          //console.log(data);
          $(".header").html(data);
      } 
  });
});

$('.book_request_list').click(function(){
  $.ajax({
      type: "POST",
      url: "header_request_book.php",
      success: function(data){
          //console.log(data);
          $(".header").html(data);
      } 
  });
});

$('.add_request_book').click(function(){
   // alert(1);
    $("#container_book").show();
    $.ajax({
    type: "POST",
    url: "form/form_request_book_manage.php",
    success: function(data){
        //console.log(data);
        $(".header").hide();
        $("#container_book").html(data);
        } 
    });
});
});



       
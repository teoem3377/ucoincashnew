$(function(){
   $("nav#nav-menu--push-left").addClass('show-to-right');
   $("#main--body").addClass('has-push-left');
   $("button#button-menu-left-toggle").click(function(event) {
      if($("nav#nav-menu--push-left").hasClass('is-active')){
        $("nav#nav-menu--push-left").addClass('hide-to-left');
        $("nav#nav-menu--push-left").removeClass('is-active');
    }
      else {
        $("nav#nav-menu--push-left").addClass('show-to-right');
         $("nav#nav-menu--push-left").removeClass('hide-to-left');
          $("nav#nav-menu--push-left").addClass('is-active');
          $("#main--body").addClass('has-push-left');
    }
    
});


   //hieu ung menu truot
    


});
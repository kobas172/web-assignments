$( function() {
    $('.logo').click(function(){
        $(this).fadeOut();
      });
    $( "#dialogWindow" ).dialog();
    $( "#text" ).tooltip();
    $( "#website" ).tooltip();
    $( "#tel" ).tooltip();
  } );
  
  
  
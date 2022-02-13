//custom sidebar toggle code


$("[data-toggle='custom-sidebar']").click(() =>{
    if ( $(".custom-sidebar").hasClass("d-none"))
    {
    $(".custom-sidebar").removeClass("d-none")
    }else {
      $(".custom-sidebar").addClass("d-none")
    }
  })
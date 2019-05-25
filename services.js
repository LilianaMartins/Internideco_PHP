$(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});


$('.dropdown-toggle').dropdown();

$(document).ready(function(){
  $(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if (scroll > 100 && matchMedia("(min-width: 700px)").matches) {
      $('.navbar').css({'background-color':'#ffffff','opacity':'1'});
      $('.nav-item').css('color','black');
      $('.nav-link').css('color','black');
      $('.navbar').css('box-shadow', '4px 2px 5px #404040');
    //  $('.nav').css({'box-shadow':'0', '4px', '2px', '-2px', 'rgba(0,0,0.2)'});

    }

    else {
      $('.navbar').css({'background':'transparent'});
      $('.nav-link').css('color','black');
      $('.navbar').css('box-shadow', 'none');
    }
  })
})

// ===== Scroll to Top ====
$(window).scroll(function() {
    if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 50px
        $('.backToTop').fadeIn(200);    // Fade in the arrow
    } else {
        $('.backToTop').fadeOut(200);   // Else fade out the arrow
    }
});
$('.backToTop').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

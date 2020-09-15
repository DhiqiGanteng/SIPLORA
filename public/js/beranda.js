$(document).ready(function(){

  var scrollLink = $('.scroll');

  //smooth scrolling
  scrollLink.click(function(e){
    e.preventDefault();
    $('body,html').animate({
      scrollTop: $(this.hash).offset().top - 50
    },750,'easeInOutExpo');
  })

})

$(window).scroll(function(){
   var wscroll = $(this).scrollTop();

   // jumbotron desktop version
   const mq = window.matchMedia( "(min-width: 460px)" );
   if (mq.matches) {
     // window width is at least 500px
     $('.bgJumbotron h1').css({
       'transform' : 'translate(0px, '+ wscroll/11+'%)'
     });

        $('.bgJumbotron p').css({
          'transform' : 'translate(0px, '+ wscroll/1+'%)'
        });

  } else {
    // window width is less than 500px
    $('.bgJumbotron h1').css({
      'transform' : 'translate(0px, '+ wscroll/11+'%)'
    });

       $('.bgJumbotron p').css({
         'transform' : 'translate(0px, '+ wscroll/2.5+'%)'
       });
  }

    // tim kami
    if(wscroll> $('.ff').offset().top-200){
      // console.log('');
      $('.col-md-4').each(function(i){
        setTimeout(function(){
          $('.col-md-4').eq(i).addClass('showing');
        },500 * (i+1));
      })
    }
});

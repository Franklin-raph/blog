$(document).ready(function(){
  const myNav = $('.navLinks')
  const openSideNav = $('#openSide')
  const closeSideNav = $('#closeSide')
  const form = $('form')

  form.submit(function(e){
    e.preventDefault()
    $.ajax({
      type: "POST",
      url: "app/controllers/users.php",
      data: form.serialize(),
      // success: function(data){
      //   console.log(data)
      // }
    })
  })




  
  openSideNav.on('click', function(){
      myNav.css("right", "0")
  })

  closeSideNav.on('click', function(){
      myNav.css("right", "-900px")
  })


    $(".autoplay").slick({

      // normal options...
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
    
      // the magic
      responsive: [{
          breakpoint: 1800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          }
    
        }, {
    
          breakpoint: 900,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true
          }
    
        }, {
    
          breakpoint: 600,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: true
            }
        }]
    });
})
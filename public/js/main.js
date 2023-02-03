

$(window).scroll(function(){
  var sticky = $('.header-area'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});

	
$( ".menu-items li" ).find( "li" ) .closest("ul") .parent("li") .addClass( 'dropdown_menu' );	
$(".menu-items li").click(function(){
  $(this).toggleClass("show");
  $('.menu-items li').not($(this)).removeClass('show');
});
	
	
$(".hamburger").click(function(){
  $(".navigation_area").toggleClass("menu-visible");
  $(".menu_overlay").toggleClass("menu-visible");
  $(".menu_close_btn").toggleClass("menu-visible");
  //$('body').toggleClass("body_overflow");
  //$('body').css('overflow', 'hidden');	
  
});


 
$(".menu_close_btn").click(function(){
  $(".navigation_area").removeClass("menu-visible");  
  $(".menu_overlay").removeClass("menu-visible");
  $(".menu_close_btn").removeClass("menu-visible");
  //$(".meanmenu-reveal2").removeClass("meanclose");
  //$('body').css('overflow', 'auto');
  //$(".meanmenu-reveal2").removeClass("menu_close_btn");
});
	
	
$(".menu_overlay").click(function(){
  $(".navigation_area").removeClass("menu-visible");  
  $(".menu_overlay").removeClass("menu-visible");
  $(".menu_close_btn").removeClass("menu-visible");
  //$(".meanmenu-reveal2").removeClass("meanclose");
  //$('body').css('overflow', 'auto');
});	



$(".sideMenu_btn").click(function(){
  $(".themeDashboarSidebar").toggleClass("open");
  $(".menuOverlay").toggleClass("open");
  $(".menuCloseBtn").toggleClass("open");
  $('body').css('overflow', 'hidden');	  
});


 
$(".menuCloseBtn").click(function(){
  $(".themeDashboarSidebar").removeClass("open");  
  $(".menuOverlay").removeClass("open");
  $(".menuCloseBtn").removeClass("open");
  $('body').css('overflow', 'auto');
});



$(".menuOverlay").click(function(){
  $(".menuOverlay").removeClass("open"); 
  $(".themeDashboarSidebar").removeClass("open");
  $(".menuCloseBtn").removeClass("open");
  $('body').css('overflow', 'auto');
});
		
			
	

	
$(".tradeFormHeaderTab .navtabs li").click(function(){
  $(this).toggleClass("active"); 
  $(".tradeFormHeaderTab .navtabs li").not(this).removeClass('active');
});

$(".tradeFormHeaderTab .navtabs .show").click(function(){   
    $(".marketForm").hide();
  $(".limitForm").show();
});
$(".tradeFormHeaderTab .navtabs .hide").click(function(){   
     $(".limitForm").hide();
  $(".marketForm").show();
});

$(".buySellTab .buySelltabs li").click(function(){
  $(this).toggleClass("active"); 
  $(".buySellTab .buySelltabs li").not(this).removeClass('active');
});

$(".buySellTab .buySelltabs .buy").click(function(){   
    $(".available").addClass("show");
  $(".range-wrap").addClass("show");
});
$(".buySellTab .buySelltabs .sell").click(function(){   
   $(".available").removeClass("show");
  $(".range-wrap").removeClass("show");
});	
	
	
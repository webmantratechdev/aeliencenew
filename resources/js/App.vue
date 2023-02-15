<template>
    <div class="">
        <router-view></router-view>
    </div>
</template>
<script>
import $ from 'jquery';

$(window).on('scroll', function () {
    var sticky = $('.header-area'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
});

$(window).on('load', function () {

    $(".menu-items li").find("li").closest("ul").parent("li").addClass('dropdown_menu');
    $(".menu-items li").on('click', function () {
        $(this).toggleClass("show");
        $('.menu-items li').not($(this)).removeClass('show');
    });


    $(".hamburger").on('click', function () {

        $(".navigation_area").addClass("menu-visible");
        $(".menu_overlay").addClass("menu-visible");
        $(".menu_close_btn").addClass("menu-visible");

    });



    $(".menu_close_btn").on('click', function () {
        $(".navigation_area").removeClass("menu-visible");
        $(".menu_overlay").removeClass("menu-visible");
        $(".menu_close_btn").removeClass("menu-visible");
    });


    $(".menu_overlay").on('click', function () {
        $(".navigation_area").removeClass("menu-visible");
        $(".menu_overlay").removeClass("menu-visible");
        $(".menu_close_btn").removeClass("menu-visible");
        //$(".meanmenu-reveal2").removeClass("meanclose");
        //$('body').css('overflow', 'auto');
    });



    $(".sideMenu_btn").on('click', function () {
        $(".themeDashboarSidebar").toggleClass("open");
        $(".menuOverlay").toggleClass("open");
        $(".menuCloseBtn").toggleClass("open");
        $('body').css('overflow', 'hidden');
    });



    $(".menuCloseBtn").on('click', function () {
        $(".themeDashboarSidebar").removeClass("open");
        $(".menuOverlay").removeClass("open");
        $(".menuCloseBtn").removeClass("open");
        $('body').css('overflow', 'auto');
    });



    $(".menuOverlay").on('click', function () {
        $(".menuOverlay").removeClass("open");
        $(".themeDashboarSidebar").removeClass("open");
        $(".menuCloseBtn").removeClass("open");
        $('body').css('overflow', 'auto');
    });



    $(".tradeFormHeaderTab .navtabs li").on('click', function () {
        $(this).toggleClass("active");
        $(".tradeFormHeaderTab .navtabs li").not(this).removeClass('active');
    });

    $(".tradeFormHeaderTab .navtabs .show").on('click',function () {
        $(".marketForm").hide();
        $(".limitForm").show();
    });
    $(".tradeFormHeaderTab .navtabs .hide").on('click', function () {
        $(".limitForm").hide();
        $(".marketForm").show();
    });

    $(".buySellTab .buySelltabs li").on('click', function () {
        $(this).toggleClass("active");
        $(".buySellTab .buySelltabs li").not(this).removeClass('active');
    });

    $(".buySellTab .buySelltabs .buy").on('click',function () {
        $(".available").addClass("show");
        $(".range-wrap").addClass("show");
    });
    $(".buySellTab .buySelltabs .sell").on('click',function () {
        $(".available").removeClass("show");
        $(".range-wrap").removeClass("show");
    });

})


export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

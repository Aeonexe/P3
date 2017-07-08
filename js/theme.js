/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

    /* Tabs */
    $('.wk-tabgroup-a > div').hide();
    $('.wk-tabgroup-a > div:first-of-type').show();
    $('.wk-tabs a').click(function(e){
      //e.preventDefault();
        var $this = $(this),
            tabgroup = '#'+$this.parents('.wk-tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
    })

    


    $('.wk-tabgroup-b > div').hide();
    $('.wk-tabgroup-b > div:first-of-type').show();
    $('.wk-tabs a').click(function(e){
      //e.preventDefault();
        var $this = $(this),
            tabgroup = '#'+$this.parents('.wk-tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
    })

    
    $('.wk-tabgroup-c > div').hide();
    $('.wk-tabgroup-c > div:first-of-type').show();
    $('.wk-tabs a').click(function(e){
      //e.preventDefault();
        var $this = $(this),
            tabgroup = '#'+$this.parents('.wk-tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
      
    })
    
    // MRT custom scripts 

    $('.click-to-show').click(function(){
        $('.click-to-show').toggleClass('is-showing');
        if( $('.click-to-show').hasClass('is-showing') ) {
            $('.mrt-form-home-container').show('fast');
        } else {
            $('.mrt-form-home-container').hide('fast');
        }
    });

    // Smooth scroll mrt

    // scroll_top_duration = 700,
    // $back_to_top = $('.to-top');
    // $back_to_top.on('click', function(event){
    //         event.preventDefault();
    //         $('body,html').animate({
    //             scrollTop: 0 ,
    //             }, scroll_top_duration
    //         );
    //     });
    
});

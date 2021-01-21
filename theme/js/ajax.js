(function($) {

	'use strict';

	var init = function() {
		// var idk;
//        var originSrc = $('.video-background video.').attr('src');
//        var originPoster = $('.video-background video').attr('poster');
        $( window ).resize(function(e){
		// 	clearTimeout(idk);
		// 	idk = setTimeout(initMain, 500);
            if($('body.home').length){
                initMain();
            }
            initPortfolio();
        });
        $( window ).resize();
        
        infiniteScroll();
        selectType();
	};
    
    // Initializing values
    var onplayingvid1 = true;
    var onpausevid1 = false;
    var onplayingvid2 = false;
    var onpausevid2 = true;
    
	var initMain = function() {
        
        var $firstVideo = $('.video-background video.video-background__visual-first');
        var $secondVideo = $('.video-background video.video-background__visual-second');
        
        // On video playing toggle values
        $firstVideo.onplaying = function() {
            onplayingvid1 = true;
            onpausevid1 = false;
        };

        // On video pause toggle values
        $firstVideo.onpause = function() {
            onplayingvid1 = false;
            onpausevid1 = true;
        };
        
        // On video playing toggle values
        $secondVideo.onplaying = function() {
            onplayingvid2 = true;
            onpausevid2 = false;
        };

        // On video pause toggle values
        $secondVideo.onpause = function() {
            onplayingvid2 = false;
            onpausevid2 = true;
        };
            
        if (window.matchMedia("(min-width: 768px)").matches) {
            var storeId = -1;
            $('#submenu-expertise li').on({
                mouseenter: function(){
                    var pattern = /post-([0-9]*)/g;
                    var classes = $(this).attr('class');
                    var matches = classes.match(pattern);
                    var id      = matches[0].substr(5);
                    
                    if(id != storeId){
                        //console.log(id, ajaxurl);

                        // setTimeout(function() {
                            //ajaxurl is given by functions.php
                            var ajaxurlJS = ajaxurl;
//                            $('.video-background').fadeOut(100);
                            $.ajax({
                                url: ajaxurlJS,
                                type: 'POST',
                                data: {
                                    action: 'get_img_video',
                                    id: id
                                },
                                success: function(data) {
//                                    console.log("SUCCESS!", data);
                                    
                                    $secondVideo.attr('src', data.data.videoSrc);
                                    $secondVideo.attr('poster', data.data.imgSrc);
                                    
//                                    $secondVideo.get(0).play();
                                    playVid($secondVideo.get(0), onplayingvid2, 2);

                                    $firstVideo.fadeOut(100);
//                                    $firstVideo.get(0).pause();
                                    pauseVid($firstVideo.get(0), onpausevid1, 1);
                                    
                                    $secondVideo.fadeIn(200);
                                },
                                error: function(data) {
    //                                console.log("FAILURE");
                                }
                            });

                            storeId = id;
                        // }, 2000);
                    }
                    else{
//                        console.log('already cached');
                        $firstVideo.fadeOut(100);
//                        $firstVideo.get(0).pause();
                        pauseVid($firstVideo.get(0), onpausevid1, 1);
                        
                        $secondVideo.fadeIn(200);
                    }
                },
                mouseleave: function(){
//                    console.log('out');
//                    $firstVideo.get(0).play();
                    playVid($firstVideo.get(0), onplayingvid1, 1);
                    
                    $secondVideo.fadeOut(100);
//                    $secondVideo.get(0).pause();
                    pauseVid($secondVideo.get(0), onpausevid2, 2);
                    
                    $firstVideo.fadeIn(200);
                }
            });
        }
        else{
            $('#submenu-expertise li').off('hover');
            
//            $firstVideo.get(0).pause();
            pauseVid($firstVideo.get(0), onpausevid1, 1);
            $firstVideo.attr('style', '');
            
//            $secondVideo.get(0).pause();
            pauseVid($secondVideo.get(0), onpausevid2, 2);
            $secondVideo.attr('style', '');
        }
	};
    

    // Play video function
    function playVid(video, onplaying, numVideo) {      
        if (video.paused && !onplaying) {
            video.play();
            
            if(numVideo == 1){
                onplayingvid1 = true;
                onpausevid1 = false;
            }
            else{
                onplayingvid2 = true;
                onpausevid2 = false;
            }
        }
    } 

    // Pause video function
    function pauseVid(video, onpause, numVideo) {     
        if (!video.paused && !onpause) {
            video.pause();
            
            if(numVideo == 1){
                onplayingvid1 = false;
                onpausevid1 = true;
            }
            else{
                onplayingvid2 = false;
                onpausevid2 = true;
            }
        }
    }
    
    
    //Infinite scroll part
//    function getDocHeight() {
//        var D = document;
//        return Math.max(
//            D.body.scrollHeight, D.documentElement.scrollHeight,
//            D.body.offsetHeight, D.documentElement.offsetHeight,
//            D.body.clientHeight, D.documentElement.clientHeight
//        );
//    }
    
    var scrolled = false;
    var infiniteScroll = function(){
        $(window).scroll(function() {
//        $('#portfolio').on('scroll', function() {
            
            
//            var scrollPosition = $(this).scrollTop() + $(this).outerHeight();
//            var divTotalHeight = $(this)[0].scrollHeight;
//            console.log(scrollPosition, divTotalHeight);
        
            if(!scrolled){
                //Height of page without the footer
                if ($(window).scrollTop() >= (($(document).height() - $(window).height()) - $('.mainfooter').innerHeight())) {
//                if(scrollPosition == divTotalHeight){
//                if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
//                if( ($(window).scrollTop() + $(window).height()) === getDocHeight() ){
                    scrolled = true;
                    
//                    console.log('bottom');
                    loadMoreWork();
                }
            }
        });
    };
    
    var loadMoreWork = function(){
        
        var paged = $('#paged').attr('value');
        var nbpage = $('#npaged').attr('value');
        var displayed = $('#displayed').attr('value');
        var catName = $('#selected').attr('value');

        //If we reached num max of page, infinite scroll is disabled
        if(paged < nbpage){
            $('#loader').fadeIn(200);
            
            //ajaxurl is given by functions.php
            var ajaxurlJS = ajaxurl;
            $.ajax({
                url: ajaxurlJS,
                type: 'POST',
                data: {
                    action: 'get_works',
                    paged: paged,
                    displayed: displayed,
                    catName: catName,
                    nbpage: nbpage
                },
                success: function(data) {
//                    console.log("SUCCESS!", data.data.paged, data);

                    $('.containWork').append(data.data.content);
                    $('#paged').attr('value', data.data.paged);
//                      if(data.data.end){
//                          $('#nd').attr('value', 1);
//                      }
                    hideShowWorks();
                    initPortfolio();
                    $('#loader').fadeOut(200);
                },
                error: function(data) {
//                        console.log("FAILURE");
                },
                complete: function(data) {
//                        console.log("COMPLETE!", data);
                    setTimeout(function() {
                        scrolled = false;
                    }, 300);
                }
            });
        }
    };
    
    var hideShowWorks = function(){
        var typeProjet = $('#selected').val();
        
        $('.portfolio__onework').hide();
        if(typeProjet != 'all'){
            $('.portfolio__onework:not(.'+typeProjet+')').fadeOut(100);
            $('.portfolio__onework.'+typeProjet).fadeIn(200);
        }
        else{
            $('.portfolio__onework').fadeIn(200);
        }
    };
    
    var initPortfolio = function() {
        $('.portfolio__onework').css({'left':'0px', 'top':'0px'});
        var refHeight = 405;
        var refFirstCol = 25;
        var refSecondCol = 70;
        
        if (window.matchMedia("(min-width: 992px)").matches) {
            var $works = $('.portfolio__onework:visible');
            var mark = 1;
            var i = 0;
            var j = 0;
            var k = 0;
//            console.log('nbVisible', $works.length);
            
            $works.each(function(){
                var height = i*refHeight;
                var count = (3*i);
                
                //First elements of lines
                if( mark == (count + 1) ){
                    $(this).css('left', '0px');
                    $(this).find('.innerLink').css({'position':'relative', 'left':'0'});
                    $(this).css('top', height + refFirstCol +'px');
                    j++;
                }
                //Second elements of lines
                else if( mark == (count + 2) ){
                    $(this).css('left', '315px');
                    $(this).find('.innerLink').css({'position':'relative', 'left':'0'});
                    $(this).css('top', height + refSecondCol +'px');
                    k++;
                }
                //Thirds elements of lines
                else if( mark == (count + 3) ){
                    $(this).css('left', '630px');
                    $(this).find('.innerLink').css({'position':'relative', 'left':'0'});
                    $(this).css('top', height+'px');
                    i++;
                }
                
                mark++;
            });

            var heightCalc = Math.max(i, j, k);

            var containerHeight = heightCalc*refHeight + (k*10);
            var portfolioHeight = 0;
            if(containerHeight == 0){
                portfolioHeight = 200;
            }
            else{
                portfolioHeight = containerHeight + 100;
            }
            
            //Calculate height with child
            $('.containWork').
                    css('display','block').
                    css('position','relative').
                    animate({opacity:1,height: containerHeight},100);
            $('#portfolio').
                    animate({height: portfolioHeight},100);
        }
        else if(window.matchMedia("(min-width: 768px)").matches){
            var $works = $('.portfolio__onework:visible');
            var mark = 1;
            var i = 0;
            var j = 0;
            
            $works.each(function(){
                var height = i*refHeight;
                var count = (2*i);
                
                //First elements of lines
                if( mark == (count + 1) ){
                    $(this).css('left', '0px');
                    $(this).find('.innerLink').css({'position':'relative', 'left':'0'});
                    $(this).css('top', height+ refFirstCol +'px');
                    j++;
                }
                //Second elements of lines
                else if( mark == (count + 2) ){
                    $(this).css('left', '385px');
                    $(this).find('.innerLink').css({'position':'relative', 'left':'0'});
                    $(this).css('top', height+ refSecondCol +'px');
                    i++;
                }
                
                mark++;
            });

            var heightCalc = Math.max(i, j);
            var containerHeight = heightCalc*refHeight + (i*10);
            var portfolioHeight = 0;
            if(containerHeight == 0){
                portfolioHeight = 200;
            }
            else{
                portfolioHeight = containerHeight + 100;
            }
            
            //Calculate height with child
            $('.containWork').
                    css('display','block').
                    css('position','relative').
                    animate({opacity:1,height:(j*refHeight)},100);
            $('#portfolio').
                    animate({height: portfolioHeight},100);
        }
        else if(window.matchMedia("(max-width: 767px)").matches){
            var $works = $('.portfolio__onework:visible');
            var i = 0;
            $works.each(function(){
                var height = i*refHeight;
                $(this).css('left', '50%');
                $(this).find('.innerLink').css({'position':'relative', 'left':'-50%'});
                $(this).css('top', height+'px');
                i++;
            });

            var containerHeight = i*refHeight;
            var portfolioHeight = 0;
            if(containerHeight == 0){
                portfolioHeight = 200;
            }
            else{
                portfolioHeight = containerHeight + 100;
            }

            //Calculate height with child
            $('.containWork').
                    css('display','block').
                    css('position','relative').
                    animate({opacity:1,height:(i*refHeight)},100);
            $('#portfolio').
                    animate({height: portfolioHeight},100);
        }
    };
    
    var selectType = function(){
        $('.linkChoice').on('click', function(e){
            e.preventDefault();
            $('#choice-presta li a').removeClass('activePresta');
            $(this).addClass('activePresta');
            
            var typeProjet = $(this).attr('href');
            //If typeProjet is different than selected
            if(typeProjet != $('#selected').val()){
                $('#selected').val(typeProjet);
                
                //Check if there is less for specified cat
                if($('.portfolio__onework.'+typeProjet).length <= 9){
                    loadMoreWork();

                    hideShowWorks();
                    initPortfolio();
                }
                else{
                    hideShowWorks();
                    initPortfolio();
                }
            }
        });
        
        $('.allWorks').on('click', function(e){
            e.preventDefault();
            $('#choice-presta li a').removeClass('activePresta');
            $(this).addClass('activePresta');
            
            $('#selected').val('all');
            $('.portfolio__onework').fadeIn(100);
            
            initPortfolio();
        });
    };
    
	$(document).ready(function() {
        init();
	});

})(jQuery);

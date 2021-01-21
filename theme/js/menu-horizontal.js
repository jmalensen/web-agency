// (function($) {
//
// 	'use strict';
//
// 	var init2 = function() {
// 		alert('salut');
// 	};
//
//
//
// 	$(document).ready(function() {
// 		init2();
// 	});
//
// })(jQuery);
//
// $(function() {
//   var items = $('#countrySelection-items').width();
//   var itemSelected = document.getElementsByClassName('countrySelection-item');
//   var backgroundColours = ["rgb(133, 105, 156)", "rgb(175, 140, 115)","rgb(151, 167, 109)","rgb(171, 100, 122)","rgb(105, 134, 156)","rgb(152, 189, 169)"]
//   countriesPointerScroll($(itemSelected));
//   $("#countrySelection-items").scrollLeft(200).delay(200).animate({
//     scrollLeft: "-=200"
//   }, 2000, "easeOutQuad");
//
// 	$('.countrySelection-paddle-right').click(function () {
// 		$("#countrySelection-items").animate({
// 			scrollLeft: '+='+items
// 		});
// 	});
// 	$('.countrySelection-paddle-left').click(function () {
// 		$( "#countrySelection-items" ).animate({
// 			scrollLeft: "-="+items
// 		});
// 	});
//
//   if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
//     var scrolling = false;
//
//     $(".countrySelection-paddle-right").bind("mouseover", function(event) {
//         scrolling = true;
//         scrollContent("right");
//     }).bind("mouseout", function(event) {
//         scrolling = false;
//     });
//
//     $(".countrySelection-paddle-left").bind("mouseover", function(event) {
//         scrolling = true;
//         scrollContent("left");
//     }).bind("mouseout", function(event) {
//         scrolling = false;
//     });
//
//     function scrollContent(direction) {
//         var amount = (direction === "left" ? "-=3px" : "+=3px");
//         $("#countrySelection-items").animate({
//             scrollLeft: amount
//         }, 1, function() {
//             if (scrolling) {
//                 scrollContent(direction);
//             }
//         });
//     }
//   }
//
//   $('.countrySelection-item').click(function () {
// 		$('#countrySelection').find('.active').removeClass('active');
// 		$(this).addClass("active");
// 		countriesPointerScroll($(this));
//     newBackgroundColour(backgroundColours)
// 	});
//
// });
// var newBackgroundColour = function(backgroundColours){
//   var newBackground = backgroundColours[Math.floor(Math.random()*backgroundColours.length)];
//   if(newBackground != $("html").css("background-color")){
//     $("html").css("background",newBackground);
//   }else{
//     newBackgroundColour(backgroundColours);
//   }
// }
//
// function countriesPointerScroll(ele) {
//
// 	var parentScroll = $("#countrySelection-items").scrollLeft();
// 	var offset = ($(ele).offset().left - $('#countrySelection-items').offset().left);
// 	var totalelement = offset + $(ele).outerWidth()/2;
//
// 	var rt = (($(ele).offset().left) - ($('#countrySelection-wrapper').offset().left) + ($(ele).outerWidth())/2);
// 	$('#countrySelector').animate({
// 		left: totalelement + parentScroll
// 	})
// }

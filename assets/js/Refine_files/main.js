AOS.init();

function searchDS() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("search-text-ds");
  filter = input.value.toUpperCase();
  ul = document.getElementById("datasheet");
  li = ul.getElementsByClassName("col-xl-6");
  for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("h1")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}

function searchUM() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("search-text-um");
  filter = input.value.toUpperCase();
  ul = document.getElementById("usermanual");
  li = ul.getElementsByClassName("col-xl-6");
  for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("h1")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}


$('[data-search]').on('keyup', function() {
	var searchVal = $(this).val();
	var filterItems = $('[data-filter-item]');

	if ( searchVal != '' ) {
		filterItems.addClass('d-none');
		$('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('d-none');
	} else {
		filterItems.removeClass('d-none');
	}
});

window.onload = function(){
  setTimeout(() => {
    $('.onTrigger').trigger('click');
  }, 1000);

}


(function ($) {
  $.fn.simpleLoadMore = function (options) {
    var settings = $.extend({
      count: 5,
      itemsToLoad: 5,
      btnHTML: '',
      btnText: 'View More',
      item: '',
      cssClass: 'load-more',
      showCounter: false,
      counterText: 'Showing {showing} out of {total}'
    }, options);


    var $loadMore = $(this);


    $loadMore.each(function (i, el) {


      var btnHTML = settings.btnHTML,
        btnText = settings.btnText,
        count = settings.count,
        itemsToLoad = settings.itemsToLoad,
        item = settings.item,
        cssClass = settings.cssClass,
        showCounter = settings.showCounter,
        counterText = settings.counterText;


      var $thisLoadMore = $(this),
        $items = $thisLoadMore.find(item),
        $btnHTML,
        $counterHTML = $('<p class="slm__counter">' + counterText + '</p>');


      if (showCounter) {
        $thisLoadMore.append($counterHTML);
      }

      if (!btnHTML) btnHTML = '<a href="#" class="' + cssClass + '__btn">' + btnText + '</a>';

      $btnHTML = $(btnHTML);

      if (!options.itemsToLoad || isNaN(options.itemsToLoad)) {
        settings.itemsToLoad = settings.count;
      }

      $thisLoadMore.addClass(cssClass);
      $items.addClass(cssClass + '__item');

      if (!$thisLoadMore.find('.' + cssClass + '__btn').length && $items.length > settings.count) {
        $thisLoadMore.append($btnHTML);
      }

      $btnHTML.add($counterHTML).html(function (i, oldHtml) {
        var newHtml = oldHtml.replace('{showing}', '<span class="slm__count slm__count--showing">' + count + '</span>');
        newHtml = newHtml.replace('{total}', '<span class="slm__count slm__count--total">' + $items.length + '</span>');

        return newHtml
      })

      var $btn = $thisLoadMore.find('.' + cssClass + '__btn');

      if (!$btn.length) {
        $btn = $btnHTML;
      }

      if ($items.length > settings.count) {
        $items.slice(settings.count).hide();
      }

      $btn.on('click', function (e) {
        e.preventDefault();

        var $this = $(this);
        var $hiddenItems = $items.filter(':hidden');
        var $updatedItems = $hiddenItems;

        if (settings.itemsToLoad !== -1 && settings.itemsToLoad > 0) {
          $updatedItems = $hiddenItems.slice(0, settings.itemsToLoad);
        }

        if ($updatedItems.length > 0) {
          $updatedItems.fadeIn();
        }

        $thisLoadMore.find('.slm__count--showing').text($items.filter(':visible').length);

        if ($hiddenItems.length <= settings.itemsToLoad || settings.itemsToLoad === -1) {
          $this.remove();
        }
      });
    });
  }
}(jQuery));


/* SideNav Trigger $Start */
function openNav() {
    document.getElementById('sideNav').classList.toggle('sideActive');
  }

  function menuTrigger(x) {
    x.classList.toggle("change");
    $(".navbar-toggler").toggleClass("refocus");
    openNav();
  }

/* Sidenav Trigger */


/* Nav Scroll Trigger */
$(window).scroll(function () {
  var scroll = $(window).scrollTop();
  if (scroll >= 10) {
    $(".navbar").addClass("bg-scroll");
    $(".navbar-toggler").addClass("menu-reverse");
  }
  else {
    $(".navbar").removeClass("bg-scroll");
    $(".navbar-toggler").removeClass("menu-reverse");
  } if ($("body").hasClass("wrapper")) {

  } else {
    $(".navbar").addClass("bg-scroll");
    $(".navbar-toggler").addClass("menu-reverse");
  }
  if (scroll >= 100) {
    $(".hiddenSearch").addClass("s-act");
  }
  else {
    $(".hiddenSearch").removeClass("s-act");
  }
});
/* Nav Scroll Trigger */


/* Slick Area */
$('.main-pusher').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  infinite: true,
  nextArrow: $('.btn-next'),
  prevArrow: $('.btn-prev'),
  asNavFor: '.img-pusher, .trigs-m',
  autoplay: true,
  autoplaySpeed: 5000,
});

$('.img-pusher').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  asNavFor: '.main-pusher',
  fade: true,
});

$('.slick-promote').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: true,
  responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    },
    {
      breakpoint: 1279,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
  ]
});


$('.trigs-m').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  vertical: true,
  verticalSwiping: true,
  asNavFor: '.main-pusher',
  arrows: false,
  centerMode: false,
  focusOnSelect: true,
});

$('.box--slider').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  infinite: true,
  nextArrow: $('.btn-next-box'),
  prevArrow: $('.btn-prev-box'),
  responsive: [
    {
      breakpoint: 1301,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
/* Slick Area */

/* Filter Area */

$(function() {

  const filterSlider = $('.prodFilter');

  $(".prodSlider").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        }
      },
      {
        breakpoint: 1279,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
    ]
  });

  $(".prodFilter").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    swipe: true,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 1279,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
    ]
  });
  
  filterSlider.on('wheel', (function(e) {
    e.preventDefault();
  
    if (e.originalEvent.deltaY < 0) {
      $(this).slick('slickPrev');
    } else {
      $(this).slick('slickNext');
    }
  }));

  $(".prodFilter li").on('click', function(){
    var filter = $(this).data('filter');
    $(".prodSlider").slick('slickUnfilter');
    
    if(filter == 'pid-1'){
      $(".prodSlider").slick('slickFilter','.pid-1');
    }
    else if(filter == 'pid-2'){
      $(".prodSlider").slick('slickFilter','.pid-2');
    }
    else if(filter == 'pid-3'){
      $(".prodSlider").slick('slickFilter','.pid-3');
    }
    else if(filter == 'pid-4'){
      $(".prodSlider").slick('slickFilter','.pid-4');
    }
    else if(filter == 'pid-5'){
      $(".prodSlider").slick('slickFilter','.pid-5');
    }
    else if(filter == 'pid-6'){
      $(".prodSlider").slick('slickFilter','.pid-6');
    }
    else if(filter == 'all'){
      
      $(".prodSlider").slick('slickUnfilter');
    }
    
  })
  
});

/* Filter Area */

/* News Filter Area */
$(".newSlider").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  swipe: false,
  accessibility: false,
});

$(".newsFilter li").on('click', function(){
  var filter = $(this).data('filter');
  $(".newSlider").slick('slickUnfilter');
  
  if(filter == 'pid-1'){
    $(".newSlider").slick('slickFilter','.pid-1');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-1").hasClass('active')) {
      $(".newsFilter .pid-1").removeClass('active');
    } else {
      $(".newsFilter .pid-1").addClass('active');
    }
  }
  else if(filter == 'pid-2'){
    $(".newSlider").slick('slickFilter','.pid-2');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-2").hasClass('active')) {
      $(".newsFilter .pid-2").removeClass('active');
    } else {
      $(".newsFilter .pid-2").addClass('active');
    }
  }
  else if(filter == 'pid-3'){
    $(".newSlider").slick('slickFilter','.pid-3');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-3").hasClass('active')) {
      $(".newsFilter .pid-3").removeClass('active');
    } else {
      $(".newsFilter .pid-3").addClass('active');
    }
  }
  else if(filter == 'pid-4'){
    $(".newSlider").slick('slickFilter','.pid-4');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-4").hasClass('active')) {
      $(".newsFilter .pid-4").removeClass('active');
    } else {
      $(".newsFilter .pid-4").addClass('active');
    }
  }
  else if(filter == 'pid-5'){
    $(".newSlider").slick('slickFilter','.pid-5');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-5").hasClass('active')) {
      $(".newsFilter .pid-5").removeClass('active');
    } else {
      $(".newsFilter .pid-5").addClass('active');
    }
  }
  else if(filter == 'pid-6'){
    $(".newSlider").slick('slickFilter','.pid-6');
    if ($(".newsFilter li").hasClass('active')) {
      $(".newsFilter li").removeClass('active');
    } else {

    }
    if ($(".newsFilter .pid-6").hasClass('active')) {
      $(".newsFilter .pid-6").removeClass('active');
    } else {
      $(".newsFilter .pid-6").addClass('active');
    }
  }
  else if(filter == 'all'){
    
    $(".newSlider").slick('slickUnfilter');
  }
  
})
/* News Filter Area */

/* Mega Menu Filter */
$(function() {

  const filterSlider = $('.prodFilter');

  $(".prodMegaSlider").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      }
    ]
  });
  

  $(".prodMegaFilter li").on('click', function(){
    var filter = $(this).data('filter');
    $(".prodMegaSlider").slick('slickUnfilter');
    
    if(filter == 'pid-1'){
      $(".prodMegaSlider").slick('slickFilter','.pid-1');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter.pid-1").hasClass('active')) {
        $(".prodMegaFilter .pid-1").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-1").addClass('active');
      }
    }
    else if(filter == 'pid-2'){
      $(".prodMegaSlider").slick('slickFilter','.pid-2');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter.pid-2").hasClass('active')) {
        $(".prodMegaFilter .pid-2").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-2").addClass('active');
      }
    }
    else if(filter == 'pid-3'){
      $(".prodMegaSlider").slick('slickFilter','.pid-3');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter .pid-3").hasClass('active')) {
        $(".prodMegaFilter .pid-3").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-3").addClass('active');
      }
    }
    else if(filter == 'pid-4'){
      $(".prodMegaSlider").slick('slickFilter','.pid-4');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter .pid-4").hasClass('active')) {
        $(".prodMegaFilter .pid-4").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-4").addClass('active');
      }
    }
    else if(filter == 'pid-5'){
      $(".prodMegaSlider").slick('slickFilter','.pid-5');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter .pid-5").hasClass('active')) {
        $(".prodMegaFilter .pid-5").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-5").addClass('active');
      }
    }
    else if(filter == 'pid-6'){
      $(".prodMegaSlider").slick('slickFilter','.pid-6');
      if ($(".prodMegaFilter li").hasClass('active')) {
        $(".prodMegaFilter li").removeClass('active');
      } else {
  
      }
      if ($(".prodMegaFilter .pid-6").hasClass('active')) {
        $(".prodMegaFilter .pid-6").removeClass('active');
      } else {
        $(".prodMegaFilter .pid-6").addClass('active');
      }
    }
    else if(filter == 'all'){
      
      $(".prodMegaSlider").slick('slickUnfilter');
    }
    
  })
  
});
/* Mega Menu Filter */

document.body.addEventListener("touchstart", function () {
  var allVideos = document.querySelectorAll('video');
  for (var i = 0; i < allVideos.length; i++) {
      allVideos[i].play();
  }
},{ once: true });

var x = window.matchMedia("(max-width: 1366px)");
var y = window.matchMedia("(min-width: 1200px)");

function jsMediaQuery(x) {
  if (x.matches) {
    $('.numberArea').removeClass('d-flex');
    $('.numberArea').addClass('d-block');
  } else {
    $('.numberArea').addClass('d-flex');
    $('.numberArea').removeClass('d-block');
  } 
}

function jsMediaQueryMin(y) {
  if (y.matches) {
    $('.menu-icon').removeClass('change');
    $('.sidenav-m').removeClass('sideActive');
    $('.navbar-toggler').removeClass('refocus');
  } else {

  } 
}

jsMediaQuery(x)
x.addListener(jsMediaQuery)
jsMediaQueryMin(y)
y.addListener(jsMediaQueryMin)
document.getElementById("year").innerHTML = new Date().getFullYear();


	$(document).ready(function() {
		$('.lightbox').topbox();
	});

  
$(".login").on('click', function(){
  $('.logMe').addClass('log-show');
})

function closeLogin() {
  $('.logMe').removeClass('log-show');
}

$('.list').simpleLoadMore({
  item: '.inp',
  count: 4,
  itemsToLoad: 4,
});

$('.list').simpleLoadMore({
  item: '.inp',
  count: 3,
  itemsToLoad: 3,
});


$('.deviceArea').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.contentArea',
});

$('.contentArea').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
});

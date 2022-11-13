// let header = document.getElementById("header");
// let headersm = document.getElementById('header-sm');
// let temp = document.getElementById("navH");
// let t = temp.getElementsByTagName("a");
// $('.infoCard').click(function(){return false;});



function init(){
	new SmoothScroll(document,120,12)
}

function SmoothScroll(target, speed, smooth) {
	if (target === document)
		target = (document.scrollingElement 
              || document.documentElement 
              || document.body.parentNode 
              || document.body) // cross browser support for document scrolling
      
	var moving = false
	var pos = target.scrollTop
  var frame = target === document.body 
              && document.documentElement 
              ? document.documentElement 
              : target // safari is the new IE
  
	target.addEventListener('mousewheel', scrolled, { passive: false })
	target.addEventListener('DOMMouseScroll', scrolled, { passive: false })

	function scrolled(e) {
		e.preventDefault(); // disable default scrolling

		var delta = normalizeWheelDelta(e)

		pos += -delta * speed
		pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)) // limit scrolling

		if (!moving) update()
	}

	function normalizeWheelDelta(e){
		if(e.detail){
			if(e.wheelDelta)
				return e.wheelDelta/e.detail/40 * (e.detail>0 ? 1 : -1) // Opera
			else
				return -e.detail/3 // Firefox
		}else
			return e.wheelDelta/120 // IE,Safari,Chrome
	}

	function update() {
		moving = true
    
		var delta = (pos - target.scrollTop) / smooth
    
		target.scrollTop += delta
    
		if (Math.abs(delta) > 0.5)
			requestFrame(update)
		else
			moving = false
	}

	var requestFrame = function() { // requestAnimationFrame cross browser
		return (
			window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.oRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
			function(func) {
				window.setTimeout(func, 1000 / 50);
			}
		);
	}()
}




var loginbtn = document.getElementById('logbtn');
console.log(loginbtn.textContent);
if (loginbtn.textContent !== "Đăng Nhập") {
	loginbtn.className='loged-in';
	// loginbtn.attributes
}
$('.login-opt').click(function(){
	$('.modal-login').css('display','grid')
	$('.modal-signup').css('display','none')
})
$('.signup-opt').click(function(){
	$('.modal-login').css('display','none')
	$('.modal-signup').css('display','grid')
})
$('#logbtn').click(function(){
	$('.modal-login').css('display','grid')
})


//members-------------------------





// $(window).on('mousewheel DOMMouseScroll', function(e) {
//     var dir,
//         amt = 100;
  
//     e.preventDefault();
//     if(e.type === 'mousewheel') {
//       dir = e.originalEvent.wheelDelta > 0 ? '-=' : '+=';
//     }
//     else {
//       dir = e.originalEvent.detail < 0 ? '-=' : '+=';
//     }      
  
//     $('html, body').stop().animate({
//       scrollTop: dir + amt
//     },100, 'linear');
//   })

// window.addEventListener("DOMMouseScroll", handleScroll);
//         window.addEventListener("mousewheel", handleScroll);
 
//         function wheelDistance(e) {
//             console.log(e);
//             if (!e) {
//                 e = window.event;
//             }
//             var w = e.wheelDelta,
//                 d = e.detail;
//             if (d) {
//                 return -d / 3; // Firefox;
//             }
 
//             // IE, Safari, Chrome & other browsers
//             return w / 120;
//         }
 
//         function handleScroll(e) {
//             var delta = wheelDistance(e);
//             console.log(delta);
//             var time = 1000;
//             var distance = 200;
 
//             $('html, body').stop().animate({
//                 scrollTop: $(window).scrollTop()
//                           - (distance * delta)
//             }, time);
//         }



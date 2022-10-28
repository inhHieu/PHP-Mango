let header = document.getElementById("header");
let headersm = document.getElementById('header-sm');
let temp = document.getElementById("navH");
let t = temp.getElementsByTagName("a");
let menu = document.getElementById('menu');
let logosm = document.getElementById('logo-sm');
let logo = document.getElementById('logo');
let arrow = document.getElementById('arrow');
let trending = document.getElementById('trending');
let story = document.getElementById('story');
let stText = document.getElementById('stText');
let capText = document.getElementById('capText');
// let myCarousel = document.getElementById('myCarousel');
// myCarousel.style.opacity='1';



window.addEventListener("scroll", function () {
    var value = window.scrollY;
    console.log(value);


    // if(value){
    //     // myCarousel.style.opacity='1';
    //     // $('#header').slideDown()
    // }
    if (value >= 1300) {
        story.style.width = "1050px";
        story.style.opacity = "1";
    }
    // else{
    //     story.style.width = "100%";
    //     story.style.opacity = "0";
    // }
    if (value >= 700) {
        arrow.style.right = "0px";
    }
    else{
        arrow.style.right = "-50px";
    }
    if (value >= 450) {
        trending.style.marginTop = "190px";
        trending.style.opacity = "1";
        console.log('fade')
    }
    else{
        arrow.style.right = "-50px";
    }
    if (value >= 400) {
        header.style.background = "black";
        headersm.style.background = "black";
        menu.style.color = "white";
        logosm.style.color = "white";
        logo.style.color = "white";
        for (i = 0; i <= t.length; i++)      t[i].style.color = "white";
    }
    else {
        header.style.background = "white";
        headersm.style.background = "white";
        menu.style.color = "black";
        logosm.style.color = "black";
        logo.style.color = "black";
        for (i = 0; i <= t.length; i++)      t[i].style.color = "black";
    }
    
})
function openside() {
    var a = document.getElementById("side-menu");
    if (a.style.width == "150px") {
        a.style.width = "0px";
    }
    else { a.style.width = "150px"; }
}


$('#myCarousel').carousel({
    interval: 6000,
    pause: "false"
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



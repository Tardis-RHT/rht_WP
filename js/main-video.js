$(function(){
    var calcVideoSize = function() {
        var video_height = $('#main_video-video').outerHeight()
        $('#main_video').css("height", video_height + 'px');
        console.log(video_height);
    }
    $(window).resize(function() {
        calcVideoSize()
    });	
        calcVideoSize();

});

var toHide = document.getElementsByClassName("toHide");
var toShow = document.getElementsByClassName("toShow");
var control_btn = document.getElementById("video-play");
function showControls(){
   
    for (var i = 0; i < toHide.length; i++){
        toHide[i].style.display="none";
    };

    for (var i = 0; i < toShow.length; i++){
        toShow[i].style.display="block";
    };
}
function hideControls(){
    
    for (var i = 0; i < toHide.length; i++){
        toHide[i].style.display="block";
    };

    for (var i = 0; i < toShow.length; i++){
        toShow[i].style.display="none";
        // toShow[i].style.visibility="hidden";
    };
}
// function checkScreen(){
//     if(screen.height == window.innerHeight){
//         console.log('Hi!');
//     }else if (screen.height !== window.innerHeight){
//         console.log('Bye!');
//     }
//     // return false;
// }

window.addEventListener("resize", function(){
    // checkScreen();
    if(screen.height !== window.innerHeight){
        onFullScreenExit()
        hideControls();
        video.play();
    }
    return false;
});	
document.cancelFullScreen = document.cancelFullScreen || document.webkitCancelFullScreen || document.mozCancelFullScreen;
function onFullScreenEnter() {
    console.log("Enter fullscreen initiated from iframe");
    showControls();
};

function onFullScreenExit() {
    console.log("Exit fullscreen initiated from iframe");
    hideControls();
};

// Note: FF nightly needs about:config full-screen-api.enabled set to true.
function enterFullscreen(id) {
    onFullScreenEnter(id);
    var el =  document.getElementById(id);
    var onfullscreenchange =  function(e){
    var fullscreenElement = document.fullscreenElement || document.mozFullscreenElement || document.webkitFullscreenElement;
    var fullscreenEnabled = document.fullscreenEnabled || document.mozFullscreenEnabled || document.webkitFullscreenEnabled;
    console.log( 'fullscreenEnabled = ' + fullscreenEnabled, ',  fullscreenElement = ', fullscreenElement, ',  e = ', e);
    }
    el.addEventListener("webkitfullscreenchange", onfullscreenchange);
    el.addEventListener("mozfullscreenchange",     onfullscreenchange);
    el.addEventListener("fullscreenchange",             onfullscreenchange);
    if (el.webkitRequestFullScreen) {
    el.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    } else {
    el.mozRequestFullScreen();
    }
    document.querySelector('#'+id + ' button').onclick = function(){
    exitFullscreen(id);
    video.play();
    }
}

function exitFullscreen(id) {
    onFullScreenExit(id);
    document.cancelFullScreen();
    
    video.play();
    
    document.querySelector('#'+id + ' button').onclick = function(){
    enterFullscreen(id);
    
    }
}

function _fullscreenEnabled() {
// FF provides nice flag, maybe others will add support for this later on?
if(window['fullScreen'] !== undefined) {
    console.log('1');
    return window.fullScreen;
}
// 5px height margin, just in case (needed by e.g. IE)
var heightMargin = 5;
if($.browser.webkit && /Apple Computer/.test(navigator.vendor)) {
    // Safari in full screen mode shows the navigation bar, 
    // which is 40px  
    heightMargin = 42;
    console.log('2');
}
return screen.width == window.innerWidth &&
    Math.abs(screen.height - window.innerHeight) < heightMargin;
}

//VIDEO CONTROLS	
var video = document.getElementById("main_video-video");
    var button = document.getElementById("video-play");
function vidplay() {
    
    if (video.paused) {
       video.play();
       button.textContent = "| |";
    } else {
       video.pause();
       button.textContent = ">";
    }
 }

 $('#main_video-video').mousemove(function(){
    $('#video-play').css('visibility', 'visible');
    $('#video-play').delay(2000).fadeOut();
    $('#main_video-video').mousemove(function(){
        $('#video-play').fadeIn();	
        $('#video-play').delay(1500).fadeOut();
    });		
});



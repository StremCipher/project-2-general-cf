
var current=new Date();
// var second=current-current;
var hour=current.getHours();
var minuts=current.getMinutes();
var second=current.getSeconds();
var timout=(hour+3)*60*60+minuts*60+second;
// alert(now);
// alert(timout);
var x = setInterval(function() {
    var current=new Date();
    // var second=current-current;
    var hour=current.getHours();
    var minuts=current.getMinutes();
    var second=current.getSeconds();
    var now=(hour)*60*60+minuts*60+second;
    var distance = timout - now;
    var hours1 = Math.floor(distance/3600);
    var minutes1 = Math.floor((distance%(60*60))/(60));
    var seconds1 = Math.floor(distance%60);
    document.getElementById("here").innerHTML="time left "+hours1 +"h "+minutes1+"m "+seconds1+"s";
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("here").innerHTML = "contest over";
    }
}, 1000);
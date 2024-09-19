function acender(){
    var lamp = document.getElementById("lp");

    if(lamp.src.match("off")){
        lamp.src = "img/on.png"; 
    } else {
        lamp.src = "img/off.png"; 
    }
}
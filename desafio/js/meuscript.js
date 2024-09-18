function lamp(){
    var objeto = document.getElementById("lamp");
    
    if (objeto.src.match("off")) {
        objeto.src = "img/on.png";
    } else {
        objeto.src = "img/off.png";
    }
}

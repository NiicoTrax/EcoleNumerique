
var catPic = document.getElementById("cat-pic");
var onCatClick = function(e) {
    var stashePic = document.getElementById("mustache-pic");
    // Utiliser les coordonnées du clic pour positionner la moustache
    stashePic.style.top = e.clientY + "px";
    stashePic.style.left = e.clientX + "px";
};
catPic.addEventListener("click", onCatClick);








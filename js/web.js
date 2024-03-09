// Begin slider
var index = 1;
changeImage = function () {
    var images = ["../img/slider1.jpg", "../img/slider2.jpg", "../img/slider3.jpg", "../img/slider4.jpg"];
    document.getElementById("img").src = images[index++];
    if(index == 4) index = 0;
}
setInterval(changeImage, 2500);
// End slider

// Begin show modal
function showModal() {
    const openModal = document.querySelector('.modal')
    openModal.classList.add('open')
}
// End show modal

// Begin hide modal
function hideModal() {
    const openModal = document.querySelector('.modal')
    openModal.classList.remove('open')
}
// End hide modal

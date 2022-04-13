// -------------- show photo -----------------

let show = document.getElementById("show");
let image1 = document.getElementById("image1");
let image2 = document.getElementById("image2");
let image3 = document.getElementById("image3");
let image4 = document.getElementById("image4");

let url = document.getElementById("url");
let url2 = document.getElementById("url2");
let url3 = document.getElementById("url3");
let url4 = document.getElementById("url4");

function showphoto(source, target) {
    target.src = source.value;
}

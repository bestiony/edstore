// product small images toggle
let big_img = document.getElementById("big_img");
let small_img = document.getElementsByClassName("small_img");


    // can be auomated with php
small_img[0].onclick = ()=>{
    big_img.src = small_img[0].src;
}
small_img[1].onclick = ()=>{
    big_img.src = small_img[1].src;
}
small_img[2].onclick = ()=>{
    big_img.src = small_img[2].src;
}
small_img[3].onclick = ()=>{
    big_img.src = small_img[3].src;
}
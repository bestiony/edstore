let cover = document.getElementById("cover");
        let searchInput = document.getElementById("searchInput");
        let body = document.getElementsByTagName("body");

        function coverPage(value) {
            cover.style.display = value;
        }

        function setVisible (value){
            cover.style.visibility = value;
            // if (value == 'hidden'){
            //     filterBtn.style.transform = "scale(10)";
            // }
        }


        let height = document.body.offsetHeight;
        function setCoverHeight(){
            cover.style.visibility = "hidden";
            cover.style.height = `${height-100}px`  ;
        }

        window.onload = setCoverHeight();
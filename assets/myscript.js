// JavaScript Document

(function() {
    var modal = document.getElementById('popup');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    
    function showModal(){
      modal.style.display = "block";
    }
    
    function hideModal(){
     modal.style.display = "none";
    }

    btn.onclick = function () {
        showModal();
    }


    span.onclick = function () {
        hideModal();
    }
 

    window.onclick = function (event) {
        if (event.target == modal) {
           showModal();
        }
    }
      showModal();
    })();


$(document).ready(function (){
    hs_hidealert(); 
});



function hs_hidealert(){
   
    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);

}

$(document).ready(function (){
    hs_hidealert(); 
});



function hs_hidealert(){
   
    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);

}

//hide tab for infomation
jQuery(document).ready(function () {
    jQuery(document).on("click", ".tab", function () {
        var display = jQuery(this).data("info"); 
        var preview = jQuery(".tab.active").data("info"); 

        if (preview) {
            jQuery("#" + preview).hide();
        }

        jQuery(".tab").removeClass("active");
        jQuery(this).addClass("active"); 
        jQuery("#" + display).show();
    });
});

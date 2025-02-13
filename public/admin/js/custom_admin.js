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

/***Code for coutnry ** */


jQuery(document).ready(function(){
    jQuery("#search").click(function(e){
        e.preventDefault(); 
        var postcode = $("#postcode").val();
        var apiKey = "iuzqamuzbDgTAZ7s2vqWa32iN9ncyn0t"; // Replace with your actual key
        var url = `https://api.os.uk/search/places/v1/postcode?postcode=${encodeURIComponent(postcode)}&key=${apiKey}`;

        jQuery.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(response) {
                console.log(response);
                var dropdown = jQuery("#addressDropdown");
                dropdown.empty(); // Clear previous results
                dropdown.append('<option value="">Select an Address</option>'); // Default option

                if (response.results && response.results.length > 0) {
                    jQuery.each(response.results, function(index, item) {
                        var address = item.DPA.ADDRESS; // Extract the address
                        dropdown.append(`<option value="${address}">${address}</option>`);
                    });
                } else {
                    dropdown.append('<option value="">No addresses found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Error fetching data: " + xhr.responseText);
            }
        });
    });

    jQuery("#addressDropdown").change(function() {
        var selectedAddress = jQuery(this).val();
        // alert(selectedAddress);
        if (selectedAddress) {
            parseAddress(selectedAddress);
        }
    });

    function parseAddress(address) {
        console.log("Parsing address:", address);

        var parts = address.split(", ");
        var length = parts.length;

        var country = "United Kingdom"; // Default as OS Places API covers UK
        var state = ""; 
        var city = "";
        var postcode = "";

        if (length >= 2) {
            postcode = parts[length - 1]; // Last part is the postcode
            city = parts[length - 2]; // Second last part is the city
        }
        if (length >= 3) {
            state = parts[length - 3]; // Third last part (if available) is state
        }

        // Update HTML with extracted values
        jQuery("#country").val(country);
        jQuery("#state").val(state || "N/A");
        jQuery("#city").val(city);
        jQuery("#zipcode").val(postcode);
    }

});


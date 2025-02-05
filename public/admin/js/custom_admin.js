let spinner = '<div class="spinner-border m-5" role="status">' +
              '</div>';

                /*** Delete  Function  ***/
     function delete_function(id,service){
        
        $.ajax({
            url: '/admin/delete/'+id+'/'+service, 
            type: 'POST', 
            processData: false, 
            contentType: false, 
        
            success: function (response) {
            if(response.status==200){
                    jQuery("#row_"+id).hide(); 
                    alert(response.message)
                }
            } 
        });
}

$(document).ready(function (){
    
    $.ajaxSetup ({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
});


function hs_hidealert(){
   
    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);

}

/**** Code for service ********/
$(document).ready(function () {

    // Code for service
    $("#service_submit").on("submit", function (e) {
        e.preventDefault(); 
        var form = new FormData(this); 

        $.ajax({
            url: '/admin/save_service_submit', 
            type: 'POST', 
            data: form,
            processData: false, 
            contentType: false, 
          
            success: function (response) {
              
                let rows = ''; 
                $.each(response.data, function (key, value) {
                    rows += '<tr id="row_'+value.id +'">'; 
                    rows += '<td>' + (value.name || '0') + '</td>';  
                    rows += '<td>' + (value.description || '0') + '</td>';  
                    rows += '<td>' + 
                                (value.price && value.price.total_price ? value.price.total_price : '0') + 
                            '</td>';            
                    rows += '<td>' + 
                                (value.price && value.price.total_price && value.price.price 
                                    ? value.price.total_price - value.price.price 
                                    : '0') + 
                            '</td>';
                    if (value.status == 1) {
                        rows += '<td> <span class="badge rounded-pill text-bg-success">Active</span> </td>';
                    } else {
                        rows += '<td> <span class="badge rounded-pill text-bg-danger">Inactive</span> </td>';
                    }
                    rows += '<td>';
                    rows += '<i class="bi bi-pencil-square service_edit" style="font-size:26px" data-eid="' + value.id + '"></i>';
                    rows += '<i class="bi bi-eye-fill view_service" style="font-size:26px"data-vid="' + value.id + '"></i>';
                    rows += '<i class="bi bi-trash delete_service" style="font-size:26px;color:#ff0000" data-did="' + value.id + '"></i>';
                    rows += '</td>';
                    rows += '</tr>'; 
                });
                $('.service_data').html(rows);
                 $('#add_service').modal('hide');
                alert("Service submitted successfully!");
            },error: function(xhr) {
                if (xhr.status === 422) {
                     let errors = xhr.responseJSON.errors;
                     
                      $.each(errors, function(key, value) {
                      
                        $('#' + key + '-error').text(value[0]); 
                        $('#' + key + '-error').show(); 
                        hs_hidealert(); 
        
                    });
                } else {
                    console.error('Error:', xhr);
                    alert('An error occurred. Please try again.');
                }
            }
        
        });
    });


 /*****Code for pirce This */

 $("#save_service_price").on("submit", function (e) {
    e.preventDefault(); 
    var form = new FormData(this); 

    $.ajax({
        url: '/admin/save_price_submit', 
        type: 'POST', 
        data: form,
        processData: false, 
        contentType: false, 
      
        success: function (response) {
           
            alert("Service submitted successfully!");
        },error: function(xhr) {
            if (xhr.status === 422) {
                 let errors = xhr.responseJSON.errors;
                 
                  $.each(errors, function(key, value) {
                  
                    $('#' + key + '-error').text(value[0]); 
                    $('#' + key + '-error').show(); 
                    hs_hidealert(); 
    
                });
            } else {
                console.error('Error:', xhr);
                alert('An error occurred. Please try again.');
            }
        }
    
    });
});


/** Code for delete **/
$(document).on("click",".delete_service",function (e){
    e.preventDefault(); 
    var id =$(this).data("did");  
    var service=jQuery(this).data('ser');
       delete_function(id,service)
  
        });


        /**Service Edit ****/

      jQuery(document).on("click",".service_edit",function (){

          var eid=jQuery(this).data('eid'); 
          var service=jQuery(this).data('ser');
          edit_function(eid,service);

        });

   
      /*** Edit Function  ***/
      function edit_function(id,service){
        
                $.ajax({
                    url: '/admin/service/'+id+'/'+service,
                    type: 'POST', 
                    processData: false, 
                    contentType: false, 
                
                    success: function (response) {
                    if(response.status==200){
                           jQuery("#edit_area").html(response.html);
                        }
                    } 
                });
    }
        

   

    
});

            /*** Edit form ***/
            $(document).ready(function () {
                
                $("#edit_service_submit").on("submit", function (e) {
                    e.preventDefault();
                 
                });
            });



            /**** Code for Slider image ********/
            $(document).ready(function () {

                // Code for slider
                $("#slider_image").on("submit", function (e) {
                    e.preventDefault(); 
                    var form = new FormData(this); 

                    $.ajax({
                        url: '/admin/save_slider_image', 
                        type: 'POST', 
                        data: form,
                        processData: false, 
                        contentType: false, 
                    
                        success: function (response) {

                            let rows = ''; 
                            $.each(response.data, function (key, value) {
                           
                                rows += '<div class="col" id="row_'+value.id+'">';                           
                                rows += '<div class="card" style="width: 18rem;">';  
                                rows += '<img src="'+response.images_path + value.image_name+'" class="card-img-top" alt="...">';  
                                rows += '<button class="delete_slider">' ;                          
                                rows += ' <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="'+value.id+'" data-ser="Slider"></i>';
                                rows += '<i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="'+value.id+'"></i>';
                                rows += '   </button>';
                                rows += ' </div>';
                                rows += '</div>';
                    
                            });
                            $('.slider_images').html(rows);
                
                             $('#add_image').modal('hide');
                            alert("Service submitted successfully!");
                        }
                        
                        });
                    });

                 /***Delete slider images ***/
                   
                 jQuery(document).on("click",".image_detete",function (e){
                    e.preventDefault(); 
                    var id =$(this).data("did");  
                    var service=jQuery(this).data('ser');
                       delete_function(id,service); 
                   

                 });
                 
                 
            }); 

           
           
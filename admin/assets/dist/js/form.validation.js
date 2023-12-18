// $(document).ready (function () {  
//     $("#chackout_form").validate ();  
//   }); 
$(document).ready(function(){
    $('#chackout_form').validate({
        rules:{
            firstname:{
                required: true,
                minlength: 2,
            
            }
        },
        massage:{
            firstname:  {
                required : "plese enter full name",
                minlength: "full name should be character",
            },
    
        },
        submitHandler: function(form){
            form.submit();
        }
    
    });
});
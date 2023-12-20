// $(document).ready (function () {  
//     $("#chackout_form").validate ();  
//   }); 
$(document).ready(function(){
    $('#chackout_form').validate({
        rules:{
            firstname:{
                required: true,
                minlength: 2,
            },
            email:{
                required: true,
                email:true,
            },
            address:{
                required: true,
                minlength: 2,
            },
            city:{
                required: true,
                minlength: 2,
            },
            state:{
                required: true,
                minlength: 2,
            },
            zip:{
                required: true,
                minlength: 6,
                number:true, 
            }
        },
        massage:{
            firstname:  {
                required : "plese enter full name",
                minlength: "full name should be two character",
            },
            email:  {
                required : "plese enter email",
                email: "invalid email Id",
            },
            address:  {
                required : "plese enter address",
                minlength: "address name should be two character",
            },
            city:  {
                required : "plese enter city",
                minlength: "city should be two character",
            },
            state:  {
                required : "plese enter state",
                minlength: "state should be two character",
            },
            zip:  {
                required : "plese enter zip code",
                minlength: "zip should be six digit",
                number:"Invalid zip code",
            },
    
        },
        submitHandler: function(form){
            form.submit();
        }
    
    });
});
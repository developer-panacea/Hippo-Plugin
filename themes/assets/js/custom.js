jQuery(document).ready(function($){

    $("#myform").validate({
        errorClass: 'text-danger',
        rules: {
          fname: {
            required: true,
          },
          mname: {
            required: true,
          },
          lname: {
            required: true,
          },
          saddress: {
            required: true,
          },
          unit: {
            required: true,
          },
          city: {
            required: true,
          },
          state: {
            required: true,
          },
          zipcode: {
            required: true,
          },
          dob: {
            required: true,
          },
          phone: {
            required: true,
          },
          email: {
            required: true,
          },
        },
        messages: {
          fname: {
            required: "Please enter first name",
          },
          mname: {
            required: "Please enter middle name",
          },
          lname: {
            required: "Please enter last name",
          },
          saddress: {
            required: "Please enter street address",
          },
          unit: {
            required: "Please enter unit",
          },
          city: {
            required: "Please enter city name",
          },
          state: {
            required: "Please select state name",
          },
          zipcode: {
            required: "Please enter zipcode",
          },
          dob: {
            required: "Please select date of birth",
          },
          phone: {
            required: "Please enter phone number",
          },
          email: {
            required: "Please enter email id",
          },
        },
         submitHandler: function (form) {
          
           getData();
         //form.submit();
                    }
      });


});

function getData(){
    var fname = jQuery('#fname').val();
    var mname = jQuery('#mname').val();
    var lname = jQuery('#lname').val();
    var saddress = jQuery('#saddress').val();
    var unit = jQuery('#unit').val();
    var city = jQuery('#city').val();
    var state = jQuery('#state').val();
    var zipcode = jQuery('#zipcode').val();
    var dob = jQuery('#dob').val();
    var phone = jQuery('#phone').val();
    var email = jQuery('#email').val();
    var ishouse = jQuery('.rd:checked').val(); 

    jQuery.ajax({
        url:my_ajax_object.ajax_url,
        method:'GET',
       
        data:{
          action : 'my_first_call',
          fname:fname,
          mname:mname,
          lname:lname,
          saddress:saddress,
          unit:unit,
          city:city,
          state:state,
          zipcode:zipcode,
          dob:dob,
          phone:phone,
          email:email,
          ishouse:ishouse

        },
        success:function(res){
          console.log(res);
          alert(res);
          $('#response').html(res);
          
        }
      });
}


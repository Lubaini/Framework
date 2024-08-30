
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/dist/jquery.min.js"></script>
<script type="text/javascript">
            
$(document).ready(function() {

//email validation
var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var passRegex = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;


function validateEmail(email,emailRegex){

    if (emailRegex.test(email)){
        return true;
    } else {
        return false;
    }
}

function validatePassword(password){

    if (password.match(/^(?=[^A-Z]*[A-Z])(?=[^!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]*[!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~])(?=\D*\d).{8,}$/)){
        return true;
    } else {
        return false;
    }
}

$('#login').on('click', function() {

    var email  = $("#email").val();
    var password = $("#password").val();

    if (email == '') {

        Swal.fire({

                icon: 'warning',
                title: 'Empty email field',
                text: 'please check your email field is empty.'
        });

    } else if(validateEmail(email, emailRegex) == false) {
        
        Swal.fire({

            icon: 'warning',
            title: 'Empty Field(s)',
            text: 'Invalid email'
        });

    } else if(password == '') {
        
        Swal.fire({

            icon: 'warning',
            title: 'Empty Field(s)',
            text: 'Password cannot be empty.'
        });

    } else if(password.length < 8) {
        
        Swal.fire({

            icon: 'warning',
            title: 'Short password length',
            text: 'Password characters should be more than 8.'
        });

    } else {

        $.ajax({

            url: 'http://localhost/23Framework/index.php?page=login',
            method: 'POST',
            data: {
                login: 1,
                email: email,
                password: password
            },
            success: function(response) {

                // response = JSON.parse(response);
                // $("#response").html(response);

                 if(response == 'invalid') {

                    Swal.fire({
                      icon: 'error',
                      title: 'Inputs Check',
                      text: 'You have provided incorrect data, please fill the form correctly.'
                    });

                } else if (response == 'failed') {

                    Swal.fire({
                    icon: 'error',
                    title: 'Access denied',
                    text: 'Wrong Email or Password'
                    });

                } else {
                  
                //   Swal.fire({
                //       icon: 'success',
                //       title: 'Successfully Logged',
                //       text: response
                //   });

                window.location.href = "http://localhost/23Framework/index.php?page=account&alert";

                }
                // console.log(response);
            },
            dataType:'text'

        });

    }

});

});
</script>
</body>
<!-- Mirrored from www.w3schools.com/html/tryit.asp?filename=tryhtml_form_submit by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2017 06:47:22 GMT -->
</html>

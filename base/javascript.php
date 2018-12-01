<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js\bootstrap.min.js" type="text/javascript"></script>
<script src="js\modernizr.js" type="text/javascript"></script>
<script src="js\script.js" type="text/javascript"></script>
<script src="js\wow.min.js" type="text/javascript"></script>
<script src="js\slick.min.js" type="text/javascript"></script>
<script src="js\sumoselect.js" type="text/javascript"></script>
<script src="js\isotop.js" type="text/javascript"></script>
<script src="js\jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="js\jquery.validate.min.js"></script>
<script src="js\additional-methods.min.js"></script>
<script type="text/javascript" src="js\jquery.cookie.min.js"></script>
<script type="text/javascript" src="js\sweetalert2.all.min.js"></script>
<script type="text/javascript" src="js\jquery.timepicker.js"></script>

<script>
var url = 'http://ict2102group8.tk:3000/';
  
$('#login_form').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        submitHandler: function(form) { // for demo
          $.ajax({
            type: 'post',
            url: url + 'login',
            data: $('#login_form').serialize(),
            success: function (respond) {
              if(!respond.errors){
                $.cookie("token", respond.token);
                window.location.reload(true);
              } else {
                swal('Any fool can use a computer');
              }
            },
            error: function(respond) {
              console.log(respond)
               swal({
                  type: 'error',
                  title: 'Oops...',
                  text: respond.responseJSON.respond
                })
            }
          });   
          
        }
    });
$('#register_form').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            fullname: {
                required: true,
                maxlength: 15
            }
        },
        submitHandler: function(form) { // for demo
          $.ajax({
            type: 'put',
            url: url + 'login',
            data: $('#register_form').serialize(),
            success: function (respond) {
              if(!respond.errors){
                $.cookie("token", respond.token);
                window.location.reload(true);
              } else {
                swal(respond.respond);
              }
            },
            error: function(respond) {
               swal({
                  type: 'error',
                  title: 'Oops...',
                  text: respond.responseJSON.respond
                })
            }
          });   
          
        }
    });
</script>
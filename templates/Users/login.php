<!-- in /templates/Users/login.php -->
<!-- Topbar Start -->
<?php echo $this->element('flash/header'); ?>
<!-- Navbar End -->

        <div class="col-lg-4 m-auto mt-4 mb-2">
                <?= $this->Flash->render() ?>
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                    <h3 class="text-center mb-4">Login</h3>
                    <?= $this->Form->create() ?>
                            <div class="form-group">
                                <!-- <input type="text" class="form-control p-4" placeholder="Subject" required="required"> -->
                                <?= $this->Form->control('email', ['required' => true,'class'=>'form-control p-4']) ?>
                            </div>
                            <div class="form-group">
                                <!-- <textarea class="form-control py-3 px-4" rows="5" placeholder="Message" required="required"></textarea> -->
                                <?= $this->Form->control('password', ['required' => true,'class'=>'form-control p-4']) ?>
                            </div>
                            <div class = 'text-center'>
                            <?= $this->Form->submit(__('Login'), ['class'=>'btn btn-primary']); ?>
                            </div>
                            <div class="text-center">
                            <br>
                           <?= $this->Html->link(__('Register'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            

<!-- Footer Start -->
<?php echo $this->element('flash/footer'); ?>
<!-- Footer End -->
<script>
$(document).ready(function(){      
  $("#formid").validate({
    rules: {
        name:{
            required: true,
            minlength : 3,
            text: true
        },
        lname:{
          required: true,
          minlength : 3
        },
        email: {
            required : true,
            email : true,
            // remote:{ 
            //   url: "checkemail.php",
            //   type: "POST",
            //  },
        },
        phone: {
            required : true,
            number : true, 
            maxlength : 10,
            minlength: 10,
        },
        password: {
            required : true,
            minlength : 6,
        },
        cpassword : {
            required : true,
            minlength : 6,
            equalTo : "#passid",
        },
        radiobtn:{
            required: true,
        }
        
       
    },
    messages: {
        name: {
            required: "please enter name",
            minlength: "length atleast 3 characters",
            text: "please enter alphabets",
        },
        lname: {
          required: "please enter last name",
          minlength: "length atleast 3 characters",
        },

        email: {
            required : "please enter email",
            email: "please enter valid email address",
            remote: "email exist",
        },
        phone: {
            required : "please enter phone",
            number: "please enter digit",
            maxlength : "maxlength is 10 digit",
            minlength: "minlength is 10 digit"
        },
        password :{
            required: "please enter password",
            minlength : "atleast 6 character length password",
        },
        cpassword :{
            required: "please confirm password",
            minlength : "atleast 6 character length passowrd",
            equalTo : "confirm password not match",
        },
        radiobtn:{
          required: "please select gender",
        }
        
    }, 
//      submitHandler: function(form) {
    
//     $.ajax({
//         url : $("#formid").attr("action"), //"ajaxinsert.php",
//         type: "POST",
//         data: $("#formid").serialize(),
//         success: function(data){
//             $("#showinfo").html("data inserted");
//         }
//     }); 
//   }
  });    

}); 
</script>
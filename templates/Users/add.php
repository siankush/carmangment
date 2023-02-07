<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<html>
<head>
    <style>
        .error{
            color: red;
        }
        .colr{
            color: black;
        }
       </style> 
</head>  
<body>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user,['id'=>'formid']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('name',['class'=>'colr','required' => false]);
                    echo $this->Form->control('email',['class'=>'colr','required' => false]);
                    echo $this->Form->control('password',['class'=>'colr','required' => false]);
                    // echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
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
</body>
</html>    





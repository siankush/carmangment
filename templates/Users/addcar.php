
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->

        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .error-message {
              color: red;
             }
         </style>   
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                <?= $this->Html->link(__('logout'), ['controller'=>'Users', 'action'=>'logout' ],['class'=>'btn btn-primary']) ?>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">

                                <?= $this->Html->link(__('Dashboard'), ['controller'=>'Users', 'action' => 'admin'], ['class' => 'nav-item nav-link']) ?>

                            </a>          
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <?= $this->Html->link(__('Add Car'), ['controller'=>'Users', 'action' => 'addcar'], ['class' => 'nav-item nav-link']) ?>
                                <?= $this->Html->link(__('All Car'), ['controller'=>'Users', 'action' => 'admin'], ['class' => 'nav-item nav-link']) ?>
                                <?= $this->Html->link(__('All User'), ['controller'=>'Users', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                                <?= $this->Html->link(__('Rated Car'), ['controller'=>'Users', 'action' => 'ratedcar'], ['class' => 'nav-item nav-link']) ?>
                                
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mb-5">
                        <h1 class="mt-4">Add Car</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Car</li>
                        </ol>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $brands
 */
?>

<div class="row">
    <aside class="column">
    </aside>
    <div class="col-lg-8 m-auto mt-4 mb-5">
        <div class="cars form content bg-light mb-4" style="padding: 30px;">

            <?= $this->Form->create($car,['enctype'=>'multipart/form-data'],['id'=>'formid']) ?>
            <fieldset>

                <?php
                    echo $this->Form->control('user_id', ['options' => $users,'class'=>'form-control p-2']);
                    echo "<br></br>";
                    echo $this->Form->control('name',['required' => false, 'class'=>'form-control p-2']);
                    echo "<br></br>";
                    echo $this->Form->control('brand_id', ['options' => $brands ,'class'=>'form-control p-2']);
                    echo "<br></br>";
                    echo $this->Form->control('model',['required' => false, 'class'=>'form-control p-2']);
                    echo "<br></br>";
                    echo '<label for="make">Make</label>';
                    echo $this->Form->select('make', [
                        '2012' => '2012',
                        '2013' => '2013',
                        '2014' => '2014',
                        '2015' => '2015',
                        '2016' => '2016',
                        '2017' => '2017',
                        '2018' => '2018',
                        '2019' => '2019',
                        '2020' => '2020',
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                    ],
                    ['class'=>'form-control p-2']
                );
                    echo "<br></br>";
                    echo "<label>Color</label>";
                    echo $this->Form->select(
                        'color',
                        ['black'=>'black','white'=>'white','grey'=>'grey',],['class'=>'form-control p-2']);

                    echo "<br></br>";
                    echo $this->Form->control('description',['required' => false, 'type'=>'textarea','class'=>'form-control p-2']);
                    echo "<br></br>";
                    echo $this->Form->control('image',['required' => false,'type'=> 'file']);
                    echo "<br></br>";
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>

        </div>
         </div>
      </div>                        
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/scripts.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <!-- <script src="js/datatables-simple-demo.js"></script> -->
<script>

$(document).ready(function(){      
  $("#formid").validate({
    rules: {
        name:{
            required: true,
            minlength : 3,
            text: true
        },
        model:{
          required: true,
        },
        description:{
          required: true,
        },
        image: {
            required : true,
            },
        
       
    },
    messages: {
        name: {
            required: "please enter name",
            minlength: "length atleast 3 characters",
            text: "please enter alphabets",
        },
        model: {
          required: "please enter last name",
        },
        description: {
          required: "please enter description",
        },
 
        image: {
            required : "please select image",
        },

        
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

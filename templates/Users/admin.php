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
        .style{
            text-decoration : none;
            color: black;
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
                                <?= $this->Html->link(__('All User'), ['controller'=>'Users', 'action' => 'index'], ['class' => 'nav-item nav-link']) ?>
                                <?= $this->Html->link(__('All Car'), ['controller'=>'Users', 'action' => 'admin'], ['class' => 'nav-item nav-link']) ?>
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                    <div class="col-2 mt-2 ms-2 float-left">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" id="searchBox" type="search" placeholder="Search" aria-label="Search">
                    </form>
                      </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                            <thead>      
                              <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('brand_id') ?></th>
                                <th><?= $this->Paginator->sort('model') ?></th>
                                <th><?= $this->Paginator->sort('make') ?></th>
                                <th><?= $this->Paginator->sort('color') ?></th>
                                <th><?= $this->Paginator->sort('description') ?></th>
                                <th><?= $this->Paginator->sort('image') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                              </thead>
                
                             <tbody>
                             <?php $n = 1 ?>
                             <?php foreach ($cars as $car): ?>
                              <tr>
                               <td><?= $this->Number->format($n) ?></td>
                               <!-- <td><?= $this->Number->format($car->id) ?></td> -->
                               <td><?= h($car->name) ?></td>
                               <td><?= $car->has('brand') ? $this->Html->link($car->brand->name, ['controller' => 'Brands', 'action' => 'view', $car->brand->id],['class'=>'style']) : '' ?></td>
                               <td><?= h($car->model) ?></td>
                               <td><?= h($car->make) ?></td>
                               <td><?= h($car->color) ?></td>
                               <td><?= h($car->description) ?></td>
                               <td><?= $this->Html->image(h($car->image),['width'=> '70px']); ?></td>
                               <td>
                    
                              <?php  if($car->status == 1) : ?>

                                <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $car->id, $car->status], ['confirm' => __('Are you sure you want to Inactive ?', $car->id)]) ?>
                              <?php else : ?>

                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'userstatus', $car->id, $car->status], ['confirm' => __('Are you sure you want to Active ?', $car->id)]) ?>
                               <?php endif; ?> 


                              </td>
                               <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'carview', $car->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'caredit', $car->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'cardelete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
                         </td>
                     </tr>
                     <?php $n++ ?>
                   <?php endforeach; ?>
                                    </tbody>
                                </table>
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

<script type="text/javascript">

function performSearch() {

// Declare search string 
var filter = searchBox.value.toUpperCase();

// Loop through first tbody's rows
for (var rowI = 0; rowI < trs.length; rowI++) {

    // define the row's cells
    var tds = trs[rowI].getElementsByTagName("td");

    // hide the row
    trs[rowI].style.display = "none";

    // loop through row cells
    for (var cellI = 0; cellI < tds.length; cellI++) {

        // if there's a match
        if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

            // show the row
            trs[rowI].style.display = "";

            // skip to the next row
            continue;

        }
    }
}

}

// declare elements
const searchBox = document.getElementById('searchBox');
const table = document.getElementById("datatablesSimple");
const trs = table.tBodies[0].getElementsByTagName("tr");

// add event listener to search box
searchBox.addEventListener('keyup', performSearch);
</script>  
    </body>
</html>


<?php
include('function.php');
session_start();
if(!strpos($_SESSION["email"],'.admin')){
    header("location:../index.html");
}
if (!isset($_SESSION["username"])) {
    header("location:../index.html");
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the "Sign Out" link element
        var signOutLink = document.getElementById('deactivate');

        // Add event listener for click event
        signOutLink.addEventListener('click', function(event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Show an alert when the link is clicked
            var confirmSignOut = confirm('Are you sure you want to DEACTIVATE?');
            
            // If user confirms sign out, redirect to specific page
            if (confirmSignOut) {
                window.location.href = '../php/DeactivateManager.php'; // Replace 'specific_page.php' with your desired page
            }
        });
    });
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management</title>
    <!-- Include necessary meta tags, stylesheets, and scripts -->
    <link href="../css/custom_styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="library/jstable.css" />
    <!-- Additional CSS files if needed -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="library/jstable.min.js" type="text/javascript"></script>
    <!-- Additional JavaScript files if needed -->
    <link rel="icon" type="image/x-icon" href="../images/png/news.png" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div style="margin-top:25px ;color:white;" class="sidebar-heading">
                Tables
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="manager.php">
                    <img style="margin-right:5px;" src="../images/png/profile-user.png" alt="">
                    <span>Users</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_results.php">
                    <img style="margin-right:5px;" src="../images/png/checklist.png" alt="">
                    <span>Results</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_matches.php">
                    <img style="margin-right:5px;" src="../images/png/football.png" alt="">
                    <span>Matches</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_news.php">
                    <img style="margin-right:5px;" src="../images/png/news.png" alt="">
                    <span>News</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <img style="margin-right:5px;" src="../images/png/team.png" alt="">
                    <span>Team</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All Players:</h6>
                        <a class="collapse-item" href="manager_gk.php">GK</a>
                        <a class="collapse-item" href="manager_defender.php">Defenders</a>
                        <a class="collapse-item" href="manager_midfielder.php">Midfielders</a>
                        <a class="collapse-item" href="manager_attacker.php">Attackers</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="manager_carpooling.php">
                    <img style="margin-right:5px;" src="../images/png/car.png" alt="">
                    <span>Carpooling</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_merchandise.php">
                <img style="margin-right:5px;" src="../images/png/store.png" alt="">
                    <span>Merchandise</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_tickets.php">
                <img style="margin-right:5px;width:32px;" src="../images/png/ticket.png" alt="">
                    <span>Tickets</span></a>
            </li>
            <div style="margin-top:25px ;color:white;" class="sidebar-heading">
                Settings
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="manager_feedback.php">
                <img style="margin-right:5px;width:32px;" src="../images/png/feedback.png" alt="">
                    <span>Feedback</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="manager_feedback.php" id="deactivate">
                <img style="margin-right:5px;width:32px;" src="../images/png/logout.png" alt="">
                    <span>Deactivate Account</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span style="font-size:15px;font-weight:700;"
                        class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo "Welcome ".$username ?>
                    </span>
                    <div class="topbar-divider d-none d-sm-block "></div>

                    <!-- Nav Item - User Information -->
                    <li style="display:flex;width:100%;" class="nav-item dropdown no-arrow">
                        <a style="margin-left: auto;" class="nav-link dropdown-toggle" href="" id="userDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="object-fit:cover;border:3px black solid;" class="img-profile rounded-circle"
                                src="../images/userpic.webp">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../php/signout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">News</h1>
                    </div>

                    <div class="container table-responsive">
                        <span id="success_message"></span>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-6">All News:</div>
                                    <div class="col col-md-6" align="right">
                                        <button type="button" name="add_data" id="add_data"
                                            class="btn btn-success btn-sm">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="customer_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Part One</th>
                                                <th>Part Two</th>
                                                <th>Part Three</th>
                                                <th>Publish Date</th>
                                                <th>Header</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo fetch_all_news($connect); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
            </div>
        </div>
    </div>
    </body>

</html>


<div class="modal" id="customer_modal" tabindex="-1" style="overflow:scroll;">
    <form method="post" id="customer_form">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="modal_title">Add Result</h5>

                    <button type="button" class="btn-close" id="close_modal" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required/>
                        <span class="text-danger" id="title_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" id="author" class="form-control" />
                        <span class="text-danger" id="author_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Part One</label>
                        <input type="text" name="p1" id="p1" class="form-control" />
                        <span class="text-danger" id="p1_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Part Two</label>
                        <input type="text" name="p2" id="p2" class="form-control" />
                        <span class="text-danger" id="p2_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Part Three</label>
                        <input type="text" name="p3" id="p3" class="form-control" />
                        <span class="text-danger" id="p3_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Publish Date</label>
                        <input type="date" name="pdate" id="pdate" class="form-control" required/>
                        <span class="text-danger" id="pdate_error"></span>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Header</label>
                        <input type="text" name="header" id="header" class="form-control" />
                        <span class="text-danger" id="header_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image Link</label>
                        <input type="text" name="img" id="img" class="form-control" />
                        <span class="text-danger" id="image_link_error"></span>

                    </div>

                </div>

                <div class="modal-footer">

                    <input type="hidden" name="customer_id" id="customer_id"/>
                    <input type="hidden" name="action" id="action" value="Add" />
                    <button type="button" class="btn btn-primary" id="action_button">Add</button>
                </div>
            </div>
        </div>

</div>

</form>

</div>

<div class="modal-backdrop fade show" id="modal_backdrop" style="display:none;"></div>



    <!-- Bootstrap core JavaScript-->
    <script src="../css/vendor/jquery/jquery.min.js"></script>
    <script src="../css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>

        var table = new JSTable("#customer_table", {
            serverSide: true,
            deferLoading: <?php echo count_all_data($connect); ?>,
            ajax: "fetch.php"
        });

        function _(element) {
            return document.getElementById(element);
        }

        function open_modal() {
            _('modal_backdrop').style.display = 'block';
            _('customer_modal').style.display = 'block';
            _('customer_modal').classList.add('show');
        }

        function close_modal() {
            _('modal_backdrop').style.display = 'none';
            _('customer_modal').style.display = 'none';
            _('customer_modal').classList.remove('show');
        }

        function reset_data() {
            _('customer_form').reset();
            _('action').value = 'Add';

            _('title_error').innerHTML = '';
            _('author_error').innerHTML = '';
            _('p1_error').innerHTML = '';
            _('p2_error').innerHTML = '';
            _('p3_error').innerHTML = '';
            _('pdate_error').innerHTML = '';
            _('header_error').innerHTML = '';
            _('image_link_error').innerHTML = '';

            _('modal_title').innerHTML = 'Add News';
            _('action_button').innerHTML = 'Add';
        }

        _('add_data').onclick = function () {
            open_modal();
            reset_data();
        }

        _('close_modal').onclick = function () {
            close_modal();
        }

        _('action_button').onclick = function () {

            var form_data = new FormData(_('customer_form'));

            _('action_button').disabled = true;

            fetch('action.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {
                // console.log("Response receive:", response);

                // return response.text(); // Retrieve response as text
                return response.json();

            }).then(function (responseData) {
                //console.log("Response received:", responseData);

                _('action_button').disabled = false;

                if (responseData.success) {
                    _('success_message').innerHTML = responseData.success;

                    close_modal();

                    table.update();
                    setTimeout(function() {
                        window.location.href = 'manager_news.php';
                    }, 1000);
                }
                else {
                    if (responseData.title_error) {
                        _('title_error').innerHTML = responseData.title_error;
                    }
                    else {
                        _('title_error').innerHTML = '';
                    }

                    if (responseData.author_error) {
                        _('author_error').innerHTML = responseData.author_error;
                    }
                    else {
                        _('author_error').innerHTML = '';
                    }

                    if (responseData.p1_error) {
                        _('p1_error').innerHTML = responseData.p1_error;
                    }
                    else {
                        _('p1_error').innerHTML = '';
                    }

                    if (responseData.p2_error) {
                        _('p2_error').innerHTML = responseData.p2_error;
                    }
                    else {
                        _('p2_error').innerHTML = '';
                    }

                    if (responseData.p3_error) {
                        _('p3_error').innerHTML = responseData.p3_error;
                    }
                    else {
                        _('p3_error').innerHTML = '';
                    }

                    if (responseData.pdate_error) {
                        _('pdate_error').innerHTML = responseData.pdate_error;
                    }
                    else {
                        _('pdate_error').innerHTML = '';
                    }
                    if (responseData.header_error) {
                        _('header_error').innerHTML = responseData.header_error;
                    }
                    else {
                        _('header_error').innerHTML = '';
                    }
                    if (responseData.image_link_error) {
                        _('image_link_error').innerHTML = responseData.image_link_error;
                    }
                    else {
                        _('image_link_error').innerHTML = '';
                    }

                
                    
                }

            });

        }

        function fetch_data(id) {
            var form_data = new FormData();

            form_data.append('id', id);

            form_data.append('action', 'fetch');

            fetch('action.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {
                return response.json();

            }).then(function (responseData) {

                _('title').value = responseData.title;
                
                _('author').value = responseData.author;

                _('p1').value = responseData.p1;

                _('p2').value = responseData.p2;

                _('p3').value = responseData.p3;

                _('pdate').value = responseData.pdate;

                _('header').value = responseData.header;

                _('img').value = responseData.img;

                _('customer_id').value = id;

                _('action').value = 'Update';

                _('modal_title').innerHTML = 'Edit News';

                _('action_button').innerHTML = 'Edit';

                open_modal();

            });
        }

        function delete_data(id) {
            if (confirm("Are you sure you want to remove it?")) {
                var form_data = new FormData();

                form_data.append('id', id);

                form_data.append('action', 'delete');

                fetch('action.php', {

                    method: "POST",

                    body: form_data

                }).then(function (response) {

                    return response.json();

                }).then(function (responseData) {

                    _('success_message').innerHTML = responseData.success;

                    table.update();
                    setTimeout(function() {
                        window.location.href = 'manager_news.php';
                    }, 1000);

                });
            }
        }

    </script>
      <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dtBottom = document.querySelector('.dt-bottom');
        if (dtBottom) {
            dtBottom.parentNode.removeChild(dtBottom);
        }
    });
</script>
</body>

</html>

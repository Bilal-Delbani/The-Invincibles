
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
    <title>Results Management</title>
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
    <link rel="icon" type="image/x-icon" href="../images/png/checklist.png" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div style="margin-top:25px; color:white;" class="sidebar-heading">
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
                        <h1 class="h3 mb-0 text-gray-800">Results</h1>
                    </div>

                    <div class="container table-responsive">
                        <span id="success_message"></span>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-6">All Results:</div>
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
                                                <th>Opponent</th>   
                                                <th>Competition</th>
                                                <th>Date</th>
                                                <th>Stadium</th>
                                                <th>Game Condition</th>
                                                <th>Game Week</th>
                                                <th>Image</th>
                                                <th>Time</th>
                                                <th>Team Score</th>
                                                <th>Opponent Score</th>
                                                <th>Team Scorers</th>
                                                <th>Opponent Scorers</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo fetch_all_results($connect); ?>
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
                        <label class="form-label">Opponent Name</label>
                        <input type="text" name="opponent_name" id="opponent_name" class="form-control" required/>
                        <span class="text-danger" id="opponent_name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Competition</label>
                        <input type="text" name="competition" id="competition" class="form-control" />
                        <span class="text-danger" id="competition_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" />
                        <span class="text-danger" id="date_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stadium Name</label>
                        <input type="text" name="stadium" id="stadium" class="form-control" />
                        <span class="text-danger" id="stadium_name_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Game Condition (HOME OR AWAY)</label>
                        <input type="text" name="gcondition" id="gcondition" class="form-control" />
                        <span class="text-danger" id="game_condition_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Game Week (GROUP STAGE, GW, SEMIFINAL..)</label>
                        <input type="text" name="week" id="week" class="form-control" required/>
                        <span class="text-danger" id="game_week_error"></span>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Image Link</label>
                        <input type="text" name="img" id="img" class="form-control" />
                        <span class="text-danger" id="image_link_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" id="time" class="form-control" />
                        <span class="text-danger" id="time_error"></span>

                    </div>
           
                    <div class="mb-3">
                        <label class="form-label">Team Score</label>
                        <input type="number" name="Tscore" id="Tscore" class="form-control" />
                        <span class="text-danger" id="team_score_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Opponent Score</label>
                        <input type="number" name="Oscore" id="Oscore" class="form-control" />
                        <span class="text-danger" id="opponent_score_error"></span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Team Scorers</label>
                        <input type="text" name="Tscorers" id="Tscorers" class="form-control" />

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Opponent Scorers</label>
                        <input type="text" name="Oscorers" id="Oscorers" class="form-control" />

                    </div>

                </div>

                <div class="modal-footer">

                    <input type="hidden" name="customer_id" id="customer_id"/>
                    <input type="hidden" name="action" id="action" value="Add" />
                    <button type="button" class="btn btn-primary" id="action_button">Add</button>
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
            _('opponent_name_error').innerHTML = '';
            _('competition_error').innerHTML = '';
            _('date_error').innerHTML = '';
            _('stadium_name_error').innerHTML = '';
            _('game_condition_error').innerHTML = '';
            _('game_week_error').innerHTML = '';
            _('image_link_error').innerHTML = '';
            _('time_error').innerHTML = '';
            _('team_score_error').innerHTML = '';
            _('opponent_score_error').innerHTML = '';

            _('modal_title').innerHTML = 'Add Result';
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

            fetch('actionresults.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {
                //console.log("Response receive:", response);

                //return response.text(); // Retrieve response as text
                return response.json();

            }).then(function (responseData) {
                //console.log("Response received:", responseData);


                _('action_button').disabled = false;

                if (responseData.success) {
                    _('success_message').innerHTML = responseData.success;

                    close_modal();

                    table.update();
                    setTimeout(function() {
                        window.location.href = 'manager_results.php';
                    }, 1000);
                }
                else {
                    if (responseData.opponent_name_error) {
                        _('opponent_name_error').innerHTML = responseData.opponent_name_error;
                    }
                    else {
                        _('opponent_name_error').innerHTML = '';
                    }

                    if (responseData.competition_error) {
                        _('competition_error').innerHTML = responseData.competition_error;
                    }
                    else {
                        _('competition_error').innerHTML = '';
                    }

                    if (responseData.date_error) {
                        _('date_error').innerHTML = responseData.date_error;
                    }
                    else {
                        _('date_error').innerHTML = '';
                    }

                    if (responseData.stadium_name_error) {
                        _('stadium_name_error').innerHTML = responseData.stadium_name_error;
                    }
                    else {
                        _('stadium_name_error').innerHTML = '';
                    }

                    if (responseData.game_condition_error) {
                        _('game_condition_error').innerHTML = responseData.game_condition_error;
                    }
                    else {
                        _('game_condition_error').innerHTML = '';
                    }

                    if (responseData.game_week_error) {
                        _('game_week_error').innerHTML = responseData.game_week_error;
                    }
                    else {
                        _('game_week_error').innerHTML = '';
                    }

                    if (responseData.image_link_error) {
                        _('image_link_error').innerHTML = responseData.image_link_error;
                    }
                    else {
                        _('image_link_error').innerHTML = '';
                    }

                    if (responseData.time_error) {
                        _('time_error').innerHTML = responseData.time_error;
                    }
                    else {
                        _('time_error').innerHTML = '';
                    }

                    if (responseData.team_score_error) {
                        _('team_score_error').innerHTML = responseData.team_score_error;
                    }
                    else {
                        _('team_score_error').innerHTML = '';
                    }

                    if (responseData.opponent_score_error) {
                        _('opponent_score_error').innerHTML = responseData.opponent_score_error;
                    }
                    else {
                        _('opponent_score_error').innerHTML = '';
                    }
                }

            });

        }

        function fetch_data(id) {
            var form_data = new FormData();

            form_data.append('id', id);

            form_data.append('action', 'fetch');

            fetch('actionresults.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {
                return response.json();

            }).then(function (responseData) {

                _('opponent_name').value = responseData.opponent_name;
                
                _('competition').value = responseData.competition;

                _('date').value = responseData.date;

                _('stadium').value = responseData.stadium;

                _('gcondition').value = responseData.game_condition;

                _('week').value = responseData.game_week;

                _('img').value = responseData.image;

                _('time').value = responseData.time;
                
                _('Tscore').value = responseData.team_score;

                _('Oscore').value = responseData.opponent_score;
                
                _('Tscorers').value = responseData.team_scorers;

                _('Oscorers').value = responseData.opponent_scorers;

                _('customer_id').value = id;

                _('action').value = 'Update';

                _('modal_title').innerHTML = 'Edit Result';

                _('action_button').innerHTML = 'Edit';

                open_modal();

            });
        }

        function delete_data(id) {
            if (confirm("Are you sure you want to remove it?")) {
                var form_data = new FormData();

                form_data.append('id', id);

                form_data.append('action', 'delete');

                fetch('actionresults.php', {

                    method: "POST",

                    body: form_data

                }).then(function (response) {

                    return response.json();

                }).then(function (responseData) {

                    _('success_message').innerHTML = responseData.success;

                    table.update();
                    setTimeout(function() {
                        window.location.href = 'manager_results.php';
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
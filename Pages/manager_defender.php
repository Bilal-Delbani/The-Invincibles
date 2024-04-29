
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
    <title>Defenders Management</title>
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
    <link rel="icon" href="../images/png/team.png">

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
                        <h1 class="h3 mb-0 text-gray-800">Defenders</h1>
                    </div>

                    <div class="container table-responsive">
                        <span id="success_message"></span>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-6">All Defenders:</div>
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
                                            <th>Player Name</th>
                                            <th>Date of Birth</th>
                                            <th>Nationality</th>
                                            <th>Email</th>
                                            <th>Injury History</th>
                                            <th>Is Injured</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Pace</th>
                                            <th>Shooting</th>
                                            <th>Passing</th>
                                            <th>Dribbling</th>
                                            <th>Defending</th>
                                            <th>Physicality</th>
                                            <th>Heading</th>
                                            <th>Composure</th>
                                            <th>Other Favorite Positions</th>
                                            <th>Communication Skills</th>
                                            <th>Leadership Skills</th>
                                        
                                            <th>Image Link</th>
                                            
                                            <th>Position</th>
                                            <th>Player Number</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo fetch_players_by_position($connect, 'Defender'); ?>
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

                    <h5 class="modal-title" id="modal_title">Add Defender</h5>

                    <button type="button" class="btn-close" id="close_modal" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body">

    <div class="mb-3">
        <label class="form-label">Player Name</label>
        <input type="text" name="player_name" id="player_name" class="form-control" required/>
        <span class="text-danger" id="player_name_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" />
        <span class="text-danger" id="date_of_birth_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Nationality</label>
        <input type="text" name="nationality" id="nationality" class="form-control" />
        <span class="text-danger" id="nationality_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" />
        <span class="text-danger" id="email_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Injury History</label>
        <input type="text" name="injury_history" id="injury_history" class="form-control" />
        <span class="text-danger" id="injury_history_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Is Injured</label>
        <input type="number" name="is_injured" id="is_injured" class="form-control" />
        <span class="text-danger" id="is_injured_error"></span>

    </div>

    <div class="mb-3">
        <label class="form-label">Height</label>
        <input type="text" name="height" id="height" class="form-control" />
        <span class="text-danger" id="height_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Weight</label>
        <input type="text" name="weight" id="weight" class="form-control" />
        <span class="text-danger" id="weight_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Pace</label>
        <input type="text" name="pace" id="pace" class="form-control" />
        <span class="text-danger" id="pace_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Shooting</label>
        <input type="text" name="shooting" id="shooting" class="form-control" />
        <span class="text-danger" id="shooting_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Passing</label>
        <input type="text" name="passing" id="passing" class="form-control" />
        <span class="text-danger" id="passing_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Dribbling</label>
        <input type="text" name="dribbling" id="dribbling" class="form-control" />
        <span class="text-danger" id="dribbling_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Defending</label>
        <input type="text" name="defending" id="defending" class="form-control" />
        <span class="text-danger" id="defending_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Physicality</label>
        <input type="text" name="physicality" id="physicality" class="form-control" />
        <span class="text-danger" id="physicality_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Heading</label>
        <input type="text" name="heading" id="heading" class="form-control" />
        <span class="text-danger" id="heading_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Composure</label>
        <input type="text" name="composure" id="composure" class="form-control" />
        <span class="text-danger" id="composure_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Other Favorite Positions</label>
        <input type="text" name="other_favorite_positions" id="other_favorite_positions" class="form-control" />
        <span class="text-danger" id="other_favorite_positions_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Communication Skills</label>
        <input type="text" name="communication_skills" id="communication_skills" class="form-control" />
        <span class="text-danger" id="communication_skills_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Leadership Skills</label>
        <input type="text" name="leadership_skills" id="leadership_skills" class="form-control" />
        <span class="text-danger" id="leadership_skills_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Image Link</label>
        <input type="text" name="image_link" id="image_link" class="form-control" />
        <span class="text-danger" id="image_link_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="text" name="position" id="position" class="form-control" value="Defender" readonly/>
        <span class="text-danger" id="position_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Player Number</label>
        <input type="text" name="player_number" id="player_number" class="form-control" />
        <span class="text-danger" id="player_number_error"></span>
    </div>

</div>


                <div class="modal-footer">

                    <input type="hidden" name="player_id" id="player_id"/>
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

            _('player_name_error').innerHTML = '';
            _('date_of_birth_error').innerHTML = '';
            _('nationality_error').innerHTML = '';
            _('email_error').innerHTML = '';
            _('injury_history_error').innerHTML = '';
            _('is_injured_error').innerHTML = '';
            _('height_error').innerHTML = '';
            _('weight_error').innerHTML = '';
            _('pace_error').innerHTML = '';
            _('shooting_error').innerHTML = '';
            _('passing_error').innerHTML = '';
            _('dribbling_error').innerHTML = '';
            _('defending_error').innerHTML = '';
            _('physicality_error').innerHTML = '';
            _('heading_error').innerHTML = '';
            _('composure_error').innerHTML = '';
            _('other_favorite_positions_error').innerHTML = '';
            _('communication_skills_error').innerHTML = '';
            _('leadership_skills_error').innerHTML = '';
            _('image_link_error').innerHTML = '';
            _('position_error').innerHTML = '';
            _('player_number_error').innerHTML = '';

            _('modal_title').innerHTML = 'Add Defender';
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

            fetch('actiondefenders.php', {

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
                        window.location.href = 'manager_defender.php';
                    }, 1000);
                }
                else {
                    if (responseData.player_name_error) {
                        _('player_name_error').innerHTML = responseData.player_name_error;
                    }
                    else {
                        _('player_name_error').innerHTML = '';
                    }

                    if (responseData.date_of_birth_error) {
                        _('date_of_birth_error').innerHTML = responseData.date_of_birth_error;
                    }
                    else {
                        _('date_of_birth_error').innerHTML = '';
                    }

                    if (responseData.nationality_error) {
                        _('nationality_error').innerHTML = responseData.nationality_error;
                    }
                    else {
                        _('nationality_error').innerHTML = '';
                    }

                    if (responseData.email_error) {
                        _('email_error').innerHTML = responseData.email_error;
                    }
                    else {
                        _('email_error').innerHTML = '';
                    }

                    if (responseData.injury_history_error) {
                        _('injury_history_error').innerHTML = responseData.injury_history_error;
                    }
                    else {
                        _('injury_history_error').innerHTML = '';
                    }

                    if (responseData.is_injured_error) {
                        _('is_injured_error').innerHTML = responseData.is_injured_error;
                    }
                    else {
                        _('is_injured_error').innerHTML = '';
                    }

                    if (responseData.height_error) {
                        _('height_error').innerHTML = responseData.height_error;
                    }
                    else {
                        _('height_error').innerHTML = '';
                    }

                    if (responseData.weight_error) {
                        _('weight_error').innerHTML = responseData.weight_error;
                    }
                    else {
                        _('weight_error').innerHTML = '';
                    }

                    if (responseData.pace_error) {
                        _('pace_error').innerHTML = responseData.pace_error;
                    }
                    else {
                        _('pace_error').innerHTML = '';
                    }

                    if (responseData.shooting_error) {
                        _('shooting_error').innerHTML = responseData.shooting_error;
                    }
                    else {
                        _('shooting_error').innerHTML = '';
                    }
                    if (responseData.passing_error) {
                        _('passing_error').innerHTML = responseData.passing_error;
                    }
                    else {
                        _('passing_error').innerHTML = '';
                    }
                    if (responseData.dribbling_error) {
                        _('dribbling_error').innerHTML = responseData.dribbling_error;
                    }
                    else {
                        _('dribbling_error').innerHTML = '';
                    }
                    if (responseData.defending_error) {
                        _('defending_error').innerHTML = responseData.defending_error;
                    }
                    else {
                        _('defending_error').innerHTML = '';
                    }
                    if (responseData.physicality_error) {
                        _('physicality_error').innerHTML = responseData.physicality_error;
                    }
                    else {
                        _('physicality_error').innerHTML = '';
                    }
                    if (responseData.heading_error) {
                        _('heading_error').innerHTML = responseData.heading_error;
                    }
                    else {
                        _('heading_error').innerHTML = '';
                    }
                    if (responseData.composure_error) {
                        _('composure_error').innerHTML = responseData.composure_error;
                    }
                    else {
                        _('composure_error').innerHTML = '';
                    }
                    if (responseData.other_favorite_positions_error) {
                        _('other_favorite_positions_error').innerHTML = responseData.other_favorite_positions_error;
                    }
                    else {
                        _('other_favorite_positions_error').innerHTML = '';
                    }
                    if (responseData.communication_skills_error) {
                        _('communication_skills_error').innerHTML = responseData.communication_skills_error;
                    }
                    else {
                        _('communication_skills_error').innerHTML = '';
                    }
                    if (responseData.leadership_skills_error) {
                        _('leadership_skills_error').innerHTML = responseData.leadership_skills_error;
                    }
                    else {
                        _('leadership_skills_error').innerHTML = '';
                    }
                    if (responseData.image_link_error) {
                        _('image_link_error').innerHTML = responseData.image_link_error;
                    }
                    else {
                        _('image_link_error').innerHTML = '';
                    }
                    if (responseData.position_error) {
                        _('position_error').innerHTML = responseData.position_error;
                    }
                    else {
                        _('position_error').innerHTML = '';
                    }
                    if (responseData.player_number_error) {
                        _('player_number_error').innerHTML = responseData.player_number_error;
                    }
                    else {
                        _('player_number_error').innerHTML = '';
                    }
                }

            });

        }

        function fetch_data(id) {
            var form_data = new FormData();

            form_data.append('id', id);

            form_data.append('action', 'fetch');

            fetch('actiondefenders.php', {

                method: "POST",

                body: form_data

            }).then(function (response) {
                return response.json();

            }).then(function (responseData) {


                _('player_name').value = responseData.player_name;
                
                _('date_of_birth').value = responseData.date_of_birth;

                _('nationality').value = responseData.nationality;

                _('email').value = responseData.email;

                _('injury_history').value = responseData.injury_history;

                _('is_injured').value = responseData.is_injured;

                _('height').value = responseData.height;

                _('weight').value = responseData.weight;
                
                _('pace').value = responseData.pace;

                _('shooting').value = responseData.shooting;
                
                _('passing').value = responseData.passing;

                _('dribbling').value = responseData.dribbling;

                _('defending').value = responseData.defending;
                
                _('physicality').value = responseData.physicality;

                _('heading').value = responseData.heading;

                _('composure').value = responseData.composure;
                
                _('other_favorite_positions').value = responseData.other_favorite_positions;

                _('communication_skills').value = responseData.communication_skills;

                _('leadership_skills').value = responseData.leadership_skills;
                
                _('image_link').value = responseData.image_link;

                _('position').value = "Defender";

                _('player_number').value = responseData.player_number;


                _('player_id').value = id;

                _('action').value = 'Update';

                _('modal_title').innerHTML = 'Edit Defender';

                _('action_button').innerHTML = 'Edit';

                open_modal();

            });
        }

        function delete_data(id) {
            if (confirm("Are you sure you want to remove it?")) {
                var form_data = new FormData();

                form_data.append('id', id);

                form_data.append('action', 'delete');

                fetch('actiondefenders.php', {

                    method: "POST",

                    body: form_data

                }).then(function (response) {

                    return response.json();

                }).then(function (responseData) {

                    _('success_message').innerHTML = responseData.success;

                    table.update();
                    setTimeout(function() {
                        window.location.href = 'manager_defender.php';
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
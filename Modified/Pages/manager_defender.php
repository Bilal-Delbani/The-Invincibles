
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

                    <h5 class="modal-title" id="modal_title">Add Defenders</h5>

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
        <select name="is_injured" id="is_injured" class="form-control">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
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
        <input type="text" name="position" id="position" class="form-control" />
        <span class="text-danger" id="position_error"></span>
    </div>

    <div class="mb-3">
        <label class="form-label">Player Number</label>
        <input type="text" name="player_number" id="player_number" class="form-control" />
        <span class="text-danger" id="player_number_error"></span>
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

            fetch('actiondefenders.php', {

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

                fetch('actiondefenders.php', {

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

</body>

</html>
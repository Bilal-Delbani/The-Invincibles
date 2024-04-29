<?php require_once ('../../php/players_retrieval_functions.php'); ?>



<!DOCTYPE html>
<head>
<?php logo() ?>
<title>
    GoalKeepers
</title>
<link rel="stylesheet" href="../../css/PlayeContainerStyles.css">
<link rel="icon" type="image/x-icon" href="../../images/png/team.png" />
</head>
<body>
    <div class="conainer">
      <?php displayPlayers('GoalKeeper','goalkeepers_table')?>
    </div>
    <!-- ?php backtoPlayers()?> -->
</body>

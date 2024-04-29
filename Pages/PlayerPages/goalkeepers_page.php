<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<head>
<?php logo() ?>
<title>
    Goal Keepers
</title>
<link rel="stylesheet" href="../../css/PlayeContainerStyles.css">
</head>
<body>
    <div class="conainer">
      <?php displayPlayers('GoalKeeper','goalkeepers_table')?>
    </div>
    <?php backtoPlayers()?>
</body>

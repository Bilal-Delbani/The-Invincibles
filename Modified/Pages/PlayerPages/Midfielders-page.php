<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<head>
<?php logo() ?>
<title>
    Midfielders
</title>
<link rel="stylesheet" href="../../css/PlayeContainerStyles.css">
</head>
<body>
    <div class="container">
      <?php displayPlayers('Midfielder','theplayers_table')?>
    </div>
    <?php backtoPlayers()?>
</body>

<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php logo() ?>
  <title>Attackers</title>
  <link rel="stylesheet" href="../../css/PlayeContainerStyles.css">
</head>
<body>
  <div class="container">
  <?php displayPlayers('Forward','theplayers_table')?>
  </div>
  <?php backtoPlayers()?>
</body>
</html>

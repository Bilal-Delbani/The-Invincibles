<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php logo() ?>
  <title>Attackers</title>
  <link rel="stylesheet" href="../../css/PlayeContainerStyles.css">
  <link rel="icon" type="image/x-icon" href="../../images/png/team.png" />

</head>
<body>
  <div class="container">
  <?php displayPlayers('Forward','theplayers_table')?>
  </div>
</body>
</html>

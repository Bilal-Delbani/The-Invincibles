<?php require_once ('../../php/players_retrieval_functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Football Club | Home</title>
    <?php logo() ?>
    <link rel="stylesheet" href="../../css/my_styles.css" />
  </head>
  <body style="background-image: none;">
    <header>
      <nav> 
        <ul>
          <li><a href="../ViewPlayersInfo.php">Home</a></li>
          <li><a href="#">Players</a></li>
          <li><a href="../PlayerPages/UnderConstruction.php">Matches</a></li>
          <li><a href="../PlayerPages/UnderConstruction.php">Stats</a></li>
          <li><a href="../PlayerPages/UnderConstruction.php">Settings</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div >
      <section class="dashboard-section">
        <div class="container">
          <div class="dashboard-container">
            <div class="dashboard-item">
              <h3>Goal Keepers</h3>
              <p>View the list of available goalkeepers on your team.</p>
              <button class="secondary-button"><a href="goalkeepers_page.php">View Keepers</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Defenders</h3>
              <p>View the list of available defenders on your team.</p>
              <button class="secondary-button"><a href="Defenders_page.php">View Defenders</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Midfielders</h3>
              <p>View the list of available midfielders on your team.</p>
              <button class="secondary-button"><a href="Midfielders-page.php">View Midfielders</a></button>
            </div>
            <div class="dashboard-item">
              <h3>Attackers</h3>
              <p>View the list of available Attackers on your team.</p>
              <button class="secondary-button"><a href="Attackers-page.php">View Attackers</a></button>
            </div>
          </div>
        </div>
      </section>
      </div>
    </main>


    <footer>
      <div class="container">
        <p>&copy; Football Club. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>

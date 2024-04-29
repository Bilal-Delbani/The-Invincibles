//function that will save the cart value in a hidden input found in merchandise page in order to be able 
//to retrieve it in the purchase page by $_POST["hidden"] and use the value of the cart in the new page

function checkForPurchase(){

  //save the cart to send and use it in the purchase page that is found in another folder
  var dump = document.getElementById("cart").innerHTML;
  document.getElementById("hidden").value=dump;


//save the quantity purchased by the user of each item to send them to purchase page that is found in another folder
//and then send them to updateDB page to enter the data in the system
  var shoes = document.getElementById("Shoes").innerHTML;
  var ball = document.getElementById("Champions Ball 2023").innerHTML;
  var shirt = document.getElementById("T-Shirt").innerHTML;
  var gloves = document.getElementById("Goal Keeper Gloves").innerHTML;
  var bibs = document.getElementById("Training Bibs").innerHTML;
  var vest = document.getElementById("Training Vest").innerHTML;
  var skeleton = document.getElementById("Skeleton Mannequin").innerHTML;
  var scarf = document.getElementById("Scarf").innerHTML;

  document.getElementById("hidden1").value=shoes;
  document.getElementById("hidden2").value=ball;
  document.getElementById("hidden3").value=shirt;
  document.getElementById("hidden4").value=gloves;
  document.getElementById("hidden5").value=bibs;
  document.getElementById("hidden6").value=vest;
  document.getElementById("hidden7").value=skeleton;
  document.getElementById("hidden8").value=scarf;


  //let the page to move to purchase.php file
  document.getElementById("purchase-form").submit();
}
  



    

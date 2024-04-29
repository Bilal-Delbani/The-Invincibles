//get the cookie that will be used as a cart variable for updating the cart selected for purchase 
var cart= document.cookie
.split('; ')
.find(row => row.startsWith('cart='))
.split('=')[1];

//variable used to keep track that all items is not selected for diabling the purchase button and if one item is selected in merchandise
//count>0 then the button is enabled
var check=0;



// function to add to Cart
function addtoCart(price,name,q){
  //if quantity in the system is not available then no adding done to cart
  if(parseInt(q)==0){
    alert("Apologies, There is no quantity available right now! Try again in another time...");
  }
  //if quantity is avaiable
  else{
    //update the value of the cart var
    var num = parseInt(price); 
    cart= Number(cart) +num;

    //change the quantity selected of that item before saving the cart 
    addProduct(name,q,num);
  }
 

}





//function to remove from cart 
function removefromCart(price,name){
  var num = parseInt(price); 

  //if there is no items or cart selected then there should not be any removing
  if(cart==0 || document.getElementById(name).innerHTML==0){
    alert("Your are having zero carts, or getting below zero selected items!");
  }

  //remove can be done
 else{
  //update the value of the cart
  cart= Number(cart) -num;
  //check if the cart will be negative then this signs that the user is removing more than selected
  if(cart<0){
    alert("Your removings are greater than the collected ones!");
    window.location.reload();
  }
    //change the quantity selected of that item before saving the cart 
    else{
    removeProduct(name);

    }
 }
  
  
}






//function that will save the number of selected items
function addProduct(name,q,num){
  var x=parseInt(document.getElementById(name).innerHTML)+1;
  //if the selected ones become greater than the quantity found in the system it cancels the last addition
  if(x>parseInt(q)){
    alert("The quantity of this product is finished...");
    document.getElementById(name).innerHTML=x-1;
    cart=Number(cart)-num;
  }
  //if quantity selected is within the available quantity in the system
  else{
    document.getElementById(name).innerHTML=x;
    //open the purchase button in order if any purchase the customer likes to do 
    document.getElementById("purchase").style.pointerEvents="visible";
    document.getElementById("label").style.pointerEvents="visible";
    document.getElementById("label").disabled=false;
    document.getElementById("purchase").disabled=false;
    //save the cart value and add the check variable to save a note that there still an item that is selected

    check++;
    updateCart();

  }

}







//the function that will update the quantity of items selected
function removeProduct(name){
  document.getElementById(name).innerHTML=parseInt(document.getElementById(name).innerHTML)-1;
  //if all items were removed then the purchase button should be closed

  check--;

  if(check==0){
    document.getElementById("purchase").style.pointerEvents="none";
    document.getElementById("label").style.pointerEvents="none";
    document.getElementById("label").disabled=true;
    document.getElementById("purchase").disabled=true;
  }

  //save the cart value
  updateCart();


}







//the function that will save the cart value
function updateCart(){
  document.getElementById("add_cart").innerHTML=cart;
}  


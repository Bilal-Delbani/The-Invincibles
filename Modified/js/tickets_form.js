// this form variable is to have the control over the form and its elements
var form = document.getElementById('paymentForm');
//this variable is to have the control over the div with id=success message inorder to update its content when purchasing is done in the form
var successMessage = document.getElementById('successMessage');
//this variable is to have the control over the reset button that returns all the fields to their initail values
var resetButton = document.getElementById('resetButton');
//this variable is used to have control over the return button that return back to the merchandise page
var returnButton = document.getElementById('returnButton');


form.addEventListener('submit', function(event) {
    //this cancel the default behavior of the submit button in order does not have submission directly, 
    //but instead we will have some checking before submitting
    event.preventDefault();

    // Perform validation and submit the form
    var cardNumber = document.getElementById('cardNumber').value;
    var confirmCardNumber = document.getElementById('confirmCardNumber').value;
    var payment= document.getElementById("payment").value;
    //x will be the value inside the cart div i.e. the total selection done by the fan
    var x = document.getElementById("total").value;
    //parsing from string to integer
    var y = Number(x);

    var bool=true;
    //parsing the payment in cash to numebr
    var p = Number(payment);
    //checking for equal credit card numebr and its confirmation 
    if (cardNumber != confirmCardNumber) {
        successMessage.textContent = 'Credit card numbers do not match.';
        successMessage.style.color = 'red';
        successMessage.classList.add('show');
        bool=false;
    } 
    //check if the cash paid by the fan is equal to the amount that should be paid (i.e. total)    
    if(p!=y){
        successMessage.textContent = "You should pay $"+x;
        successMessage.style.color = 'red';
        successMessage.classList.add('show');
        bool=false;
    } 
    //if all checking is correct then submission is done
    if(bool) {
        successMessage.textContent = 'Payment successful!';
        successMessage.style.color = 'green';
        successMessage.classList.add('show');

        // Submit the form fields
        form.submit();


    }
});
//function that reset the fields vto their initail values
resetButton.addEventListener('click', function() {
    form.reset();
    successMessage.classList.remove('show');
});
//function that return the fan to the merchandise page
returnButton.addEventListener('click', function() {
    window.location.href = '../Pages/Tickets.php';
});
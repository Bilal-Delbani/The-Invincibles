var buy = document.getElementById("buy");
var total = 0;
var count=0;

/*this function will check if one of the checkboxes found to choose among them (front ticket, middle ticket and back ticket) 
the other checkboxes are disabled so no two tickets purchased in two different positions in the same stadium by the same fan*/ 
function handleCheckbox1(checkbox) {
var checkboxes = document.querySelectorAll('input[type="checkbox"][name="match1"]');
//save one of the values chosen of the three chekboxes in the hidden input so this value becomes as the value of the whole match
var hiddenInput = document.getElementById("hidden1");

checkboxes.forEach(function (cb) {
  if (cb !== checkbox) {
    cb.disabled = checkbox.checked;
    cb.checked = false;
  }
});
//this variable is used to be saved in the hidden input
var v = Math.ceil(parseFloat(checkbox.value));

if (checkbox.checked) {
    //save the variable i nthe hidden input
  hiddenInput.value = v;
  //sum all the hidden inputs in a total variable to check it in the purchasing process when the fan needs to pay 
  //if s/he is paying the total amount or not
  total+=v;
  //this variable is used to check if there any ticket is selected by the fan then the purchase button is still enabled
  count++;
  //open the purchase button when one ticket is selected in the system
  buy.disabled = false;
  buy.style.pointerEvents = "visible";

} 
//if the checkbox is removed in case if the fan is not needing that ticket anymore then the vairables should be return to the value one before 
else {
    //clear the hidden input from values until one of the checkboxes in the match schedule is rechecked
  hiddenInput.value = "";
  //remove the value of the match from the total amount paid by the fan
  total-=v;
  //take a note that one ticket is removed
  count--;
  //if all tickets were removed then the purchase button is disabled again
  if (count === 0) {
    buy.disabled = true;
    buy.style.pointerEvents = "none";
}
}


}

//this function is similar to the one before but it works on match 2
function handleCheckbox2(checkbox) {
var checkboxes = document.querySelectorAll('input[type="checkbox"][name="match2"]');
var hiddenInput = document.getElementById("hidden2");

checkboxes.forEach(function (cb) {
  if (cb !== checkbox) {
    cb.disabled = checkbox.checked;
    cb.checked = false;
  }
});
var v = Math.ceil(parseFloat(checkbox.value));
if (checkbox.checked) {
  hiddenInput.value = v;
  total+=v;
  count++;
  buy.disabled = false;
  buy.style.pointerEvents = "visible";
} else {
  hiddenInput.value = "";
  total-=v;
  count--;
  if (count === 0) {
    buy.disabled = true;
    buy.style.pointerEvents = "none";
}
}
}



//this function is similar to the one before but it works on match 3

function handleCheckbox3(checkbox) {
var checkboxes = document.querySelectorAll('input[type="checkbox"][name="match3"]');
var hiddenInput = document.getElementById("hidden3");

checkboxes.forEach(function (cb) {
  if (cb !== checkbox) {
    cb.disabled = checkbox.checked;
    cb.checked = false;
  }
});
var v = Math.ceil(parseFloat(checkbox.value));

if (checkbox.checked) {
  hiddenInput.value = v;
  total+=v;
  count++;
  buy.disabled = false;
  buy.style.pointerEvents = "visible";
} else {
  hiddenInput.value = "";
  total-=v;
  count--;
  if (count === 0) {
    buy.disabled = true;
    buy.style.pointerEvents = "none";
}
}
}



//this function is similar to the one before but it works on match 4

function handleCheckbox4(checkbox) {
var checkboxes = document.querySelectorAll('input[type="checkbox"][name="match4"]');
var hiddenInput = document.getElementById("hidden4");

checkboxes.forEach(function (cb) {
  if (cb !== checkbox) {
    cb.disabled = checkbox.checked;
    cb.checked = false;
  }
});
var v = Math.ceil(parseFloat(checkbox.value));
if (checkbox.checked) {
  hiddenInput.value = v;
  total+=v;
  count++;
  buy.disabled = false;
  buy.style.pointerEvents = "visible";
} else {
  hiddenInput.value = "";
  total-=v;
  count--;
  if (count === 0) {
    buy.disabled = true;
    buy.style.pointerEvents = "none";
}
}
}





//this function is similar to the one before but it works on match 5

function handleCheckbox5(checkbox) {
var checkboxes = document.querySelectorAll('input[type="checkbox"][name="match5"]');
var hiddenInput = document.getElementById("hidden5");

checkboxes.forEach(function (cb) {
  if (cb !== checkbox) {
    cb.disabled = checkbox.checked;
    cb.checked = false;
  }
});
var v = Math.ceil(parseFloat(checkbox.value));
if (checkbox.checked) {
  hiddenInput.value = v;
  total+=v;
  count++;
  buy.disabled = false;
  buy.style.pointerEvents = "visible";
} else {
  hiddenInput.value = "";
  total-=v;
  count--;
  if (count === 0) {
    buy.disabled = true;
    buy.style.pointerEvents = "none";
}
}
}


//this function is used to save the total value collected by the fan at the end and save it in one of the hidden inputs
//to benefit from it by getting it in php file when submitting the form 
function getTotal(){
document.getElementById("total").value=total;
//submit the form

document.getElementById("purchase-form").submit();
}

//log out function
function Logout(){
window.location.href = "http://localhost/Web-Project/index.php";
}





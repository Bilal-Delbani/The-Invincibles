function openPopup() {
    document.getElementById("myPopup").style.display = "block";
  }

  function closePopup() {
    document.getElementById("myPopup").style.display = "none";
  }

  document.getElementById('points-form').addEventListener('submit', function(event) {
  // Prevent form submission
  event.preventDefault();
  
  // Disable the button
  document.getElementById('collect-points-button').disabled = true;
  
  // Submit the form
  this.submit();
  
  // Hide the form after submission
  this.style.display = 'none';
});
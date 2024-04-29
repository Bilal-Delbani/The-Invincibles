function myAlert(message, url, actionmsg,direct) {
    const alertBox = document.createElement('div');
    alertBox.classList.add('alert-box');
    alertBox.innerHTML = `
      <div class="alert-message">${message}</div>
      <button onclick="goToPage('${url}')" style="margin:20px;margin-top:0px;" class="alert-button">${actionmsg}</button>
    `;
    document.body.appendChild(alertBox);
  
    const button = alertBox.querySelector('.alert-button');
    button.addEventListener('click', () => {
      alertBox.style.opacity = '0';
      alertBox.style.transform = 'translate(-50%, -50%) scale(0.5)';
      setTimeout(() => {
        document.body.removeChild(alertBox);
      }, 500); // Wait for the transition to complete before removing the element
    });
  
    alertBox.style.display = 'flex';
    alertBox.style.alignItems = 'center';
    alertBox.style.justifyContent = 'center';
    alertBox.style.position = 'fixed';
    alertBox.style.top = '50%';
    alertBox.style.left = '50%';
    alertBox.style.transform = 'translate(-50%, -50%) scale(0.5)';
    alertBox.style.width = 'auto';
    alertBox.style.height = 'auto';
    alertBox.style.backgroundColor = '#272525';
    alertBox.style.zIndex = '999';
    alertBox.style.display = 'inline-block';
    alertBox.style.borderRadius = '15px';
    alertBox.style.padding = '30px';
  
    // Add transitions to the alertBox element
    alertBox.style.transition = 'all 0.3s ease-out';
    alertBox.style.opacity = '0';
    alertBox.style.transform = 'translate(-50%, -50%) scale(0.5)';
  
    // Wait for the transition to complete before showing the alert
    setTimeout(() => {
      alertBox.style.opacity = '1';
      alertBox.style.transform = 'translate(-50%, -50%) scale(1)';
    }, 50);
  
    const messageElement = alertBox.querySelector('.alert-message');
    messageElement.style.color = 'white';
    messageElement.style.fontSize = '25px';
    messageElement.style.marginBottom = '25px';
  
    button.style.padding = '10px 20px';
    button.style.backgroundColor = 'gold';
    button.style.border = 'none';
    button.style.color = 'black';
    button.style.fontSize = '18px';
    button.style.cursor = 'pointer';
    button.style.borderRadius = '15px';
    button.style.margin='0px';
    button.style.marginRight='10px';
    button.style.float ='right';
  }
  
  function goToPage(url) {
    window.location.href = url;
  }
  
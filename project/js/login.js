document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        // Validate email
        const email = emailInput.value.trim();
        if (!email) {
            showError(emailInput, "Email is required!");
            isValid = false;
        }
        
        // Validate password
        const password = passwordInput.value;
        if (!password) {
            showError(passwordInput, "Password is required!");
            isValid = false;
        }
        
        // If all validations pass, submit the form
        if (isValid) {
            this.submit();
        }
    });
    
    // Show error for specific field
    function showError(inputElement, message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'field-error';
        errorElement.textContent = message;
        errorElement.style.color = '#721c24';
        errorElement.style.fontSize = '14px';
        errorElement.style.marginTop = '5px';
        
        // Insert error after input
        inputElement.parentNode.appendChild(errorElement);
    }
});
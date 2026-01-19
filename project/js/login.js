document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    // Clear error messages when user starts typing
    emailInput.addEventListener('input', function() {
        const errorElement = this.parentNode.querySelector('.field-error');
        if (errorElement) {
            errorElement.remove();
        }
    });
    
    passwordInput.addEventListener('input', function() {
        const errorElement = this.parentNode.querySelector('.field-error');
        if (errorElement) {
            errorElement.remove();
        }
    });
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        // Clear previous errors
        clearAllErrors();
        
        // Validate email
        const email = emailInput.value.trim();
        if (!email) {
            showError(emailInput, "Email is required!");
            isValid = false;
        } else if (!validateEmail(email)) {
            showError(emailInput, "Please enter a valid email address!");
            isValid = false;
        }
        
        // Validate password
        const password = passwordInput.value;
        if (!password) {
            showError(passwordInput, "Password is required!");
            isValid = false;
        } else if (password.length < 6) {
            showError(passwordInput, "Password must be at least 6 characters!");
            isValid = false;
        }
        
        // If all validations pass, submit the form
        if (isValid) {
            this.submit();
        }
    });
    
    // Email validation function
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Show error for specific field
    function showError(inputElement, message) {
        // Remove existing error if any
        const existingError = inputElement.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Create error message element
        const errorElement = document.createElement('div');
        errorElement.className = 'field-error';
        errorElement.textContent = message;
        errorElement.style.color = '#721c24';
        errorElement.style.fontSize = '14px';
        errorElement.style.marginTop = '5px';
        
        // Insert error after input
        inputElement.parentNode.appendChild(errorElement);
        
        // Focus on the error field
        inputElement.focus();
    }
    
    // Clear all errors
    function clearAllErrors() {
        document.querySelectorAll('.field-error').forEach(function(error) {
            error.remove();
        });
    }
});
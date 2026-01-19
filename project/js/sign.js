document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const nameInput = document.getElementById('name');
    const ageInput = document.getElementById('age');
    const emailInput = document.getElementById('email');
    const addressInput = document.getElementById('address');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    
    signupForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Clear previous errors
        clearAllErrors();
        
        // Validate name
        const name = nameInput.value.trim();
        if (!name) {
            showError(nameInput, "Name is required!");
            isValid = false;
        }
        
        // Validate age
        const age = parseInt(ageInput.value);
        if (!ageInput.value) {
            showError(ageInput, "Age is required!");
            isValid = false;
        } else if (isNaN(age) || age < 18 || age > 100) {
            showError(ageInput, "Age must be between 18 and 100!");
            isValid = false;
        }
        
        // Validate email
        const email = emailInput.value.trim();
        if (!email) {
            showError(emailInput, "Email is required!");
            isValid = false;
        } else if (!validateEmail(email)) {
            showError(emailInput, "Please enter a valid email address!");
            isValid = false;
        }
        
        // Validate address
        const address = addressInput.value.trim();
        if (!address) {
            showError(addressInput, "Address is required!");
            isValid = false;
        } else if (address.length < 10) {
            showError(addressInput, "Address should be more detailed!");
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
        
        // Validate confirm password
        const confirmPassword = confirmPasswordInput.value;
        if (!confirmPassword) {
            showError(confirmPasswordInput, "Please confirm your password!");
            isValid = false;
        } else if (password !== confirmPassword) {
            showError(confirmPasswordInput, "Passwords do not match!");
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    // Email validation function
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Show error for specific field
    function showError(inputElement, message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'field-error';
        errorElement.textContent = message;
        
        inputElement.parentNode.appendChild(errorElement);
    }
    
    // Clear all errors
    function clearAllErrors() {
        document.querySelectorAll('.field-error').forEach(function(error) {
            error.remove();
        });
    }
});
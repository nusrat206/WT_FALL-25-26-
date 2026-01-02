<!Doctype html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Tech Festival</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
        <div class="container">
        <h2>Participant Registration Section</h2>
<table>
        <form onsubmit="return validateForm();">
 
 
        <tr>
           <td> <label>Full Name:</label></td>
            <td><input type="text" id="Full_Name" oninput="resetErrors()">
            <div class="error" id="Full_Name-error"></div></td>
</tr>
 
        <tr>
           <td> <label>Email:</label></td>
            <td><input type="text" id="email" oninput="resetErrors()">
            <div class="error" id="email-error"></div></td>
</tr> 
 <tr>
           <td> <label>Phone Number:</label></td>
            <td><input type="number" id="Phonr_Number" oninput="resetErrors()">
            <div class="error" id="Phone_Number-error"></div></td>
</tr> 





 
        <tr>
           <td> <label>Password:</label></td>
            <td><input type="password" id="password" oninput="resetErrors()">
            <div class="error" id="password-error"></div></td>
</tr>
 
        <tr>
           <td> <label>Confirm Password:</label></td>
            <td><input type="password" id="cpass" oninput="resetErrors()">
            <div class="error" id="cpass-error"></div></td>
</tr>
 
 
 
</table>

        </form>
        </center>
 
 
   
 
 
    <script>
function validateForm() {
 
    const Full_Name = document.getElementById("Full_Name").value;
    const email = document.getElementById("email").value;
    const Phone_Number = document.getElementById("Phone_Number").value;
    const pass = document.getElementById("password").value;
    const cpass = document.getElementById("cpass").value;
 
    const nEr = document.getElementById("Full_Name-error");
    const eEr = document.getElementById("email-error");
    const pnEr = document.getElementById("Phone_number-error");
    const pEr = document.getElementById("password-error");
    const cEr = document.getElementById("cpass-error");
 
   
    nEr.textContent = "";
    eEr.textContent = "";
    pner.textContent ="";
    pEr.textContent = "";
    cEr.textContent = "";
 
    let valid = true;
 
   
    if (Full_Name === "") {
        nEr.textContent = "Name cannot be empty.";
        valid = false;
    } else if (/\d/.test(Full_name)) {
        nEr.textContent = "Name cannot contain numbers.";
        valid = false;
    } else if (!/^[A-Za-z ]+$/.test(Full_name)) {
        nEr.textContent = "Name must contain only letters.";
        valid = false;
    }
 
   
    if (email === "") {
        eEr.textContent = "Email cannot be empty.";
        valid = false;
    } else if (!email.includes("@")) {
        eEr.textContent = "Email must contain @ symbol.";
        valid = false;
    }
     if (Phone_Number === "") {
        eEr.textContent = "Phone_number cannot be empty.";
        valid = false;
    } else if (!email.includes("@")) {
        eEr.textContent = "Phone_Number must contain @ symbol.";
        valid = false;
    }
 
   
    if (pass === "") {
        pEr.textContent = "Password cannot be empty.";
        valid = false;
    }
 
    if (cpass === "") {
        cEr.textContent = "Confirm your password.";
        valid = false;
    } else if (pass !== cpass) {
        cEr.textContent = "Passwords do not match.";
        valid = false;
    }
 
   
    if (!valid) return false;
 
    
    const box = document.getElementById("success-message");
    box.style.display = "block";
    box.innerHTML = `
        <strong>Registration Successful!</strong><br><br>
        <b>Full_Name:</b> ${Full_Name}<br>
        <b>Email:</b> ${email}
    `;
 
    return false; 
}
 
 

function clearErrors() {
    document.getElementById("Full_Name-error").textContent = "";
    document.getElementById("email-error").textContent = "";
    document.getElementById("Phone_Number-error").textContent = "";
    document.getElementById("password-error").textContent = "";
    document.getElementById("cpass-error").textContent = "";
}
</script>
    </div>
</body>
</html>
 
<!DOCTYPE html>
<html>
<head>
    <title>My Web Page</title>
 
    <style>
        #head
        {
            color: goldenrod;
            text-align: center;
        }
 
    .fn
    {
        font-family: Arial, sans-serif;
        font-size: 16px;
        right: 200px;
    }
    </style>
</head>
<body>
    <h1 id="head">Clinic Patient Registration </h1>
    <center>
    <table>
        <tr>
            <td><p class="fn">Full Name:</p>
            <input type="text" name="full_name"></td>
        </tr>
        <tr>
            <td><p class="fn">Age:</p><input type="number" name="age"></td>
        </tr>
        <tr>   
        </tr>
        <tr>
            <td><p class="fn">Phone Number:</p>
            <input type="number" name="Phone_Number"></td>
        </tr>
        <tr>
            <td><p class="fn">Email Address:</p>
            <input type="Text" name="Email_Address"></td>
        </tr>
<tr>
            <td><p class="fn">Insaurance Provider:</p>
            
                <select name="Select Provider">
                    <option value="Select Provider">Select Provider</option>
                    <option value="Provider A">Provider A</option>
                    <option value="Provider B">Provider B</option>
          
                </select>
            </td>

        <tr>
            <td><p class="fn">Insuarnce Policy Number:</p>
            <input type="Number" name="Insurance_POlicy_Number"></td>
        </tr>
        
      
    </table> 
    
    
</body> 
      <tr><td><h1 id="head">Additional Information </h1></td></tr>


    <table>
        <tr>
            <td><p class="fn">Username:</p>
            <input type="text" name="Username"></td>
        </tr>
        <tr>
            <td><p class="fn">Pssword:</p>
            <input type="text" name="Password"></td>
        </tr>
        <tr>
            <td><p class="fn">Confirm Password:</p>
            <input type="text" name="Confirm Password"></td>
        </tr>



    </table>
    <input id="reg" type="Submit" value="Register">

</center>


</html>
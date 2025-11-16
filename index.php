<!DOCTYPE html>
<html>
<head>
    <title>My Web Page</title>
 
    <style>
        .head
        {
            color: blue;
            text-align: center;
            font-size: 22px;
        }
 <table> 
    .fn
    {
        font-family: Arial, sans-serif;
        font-size: 16px;
        right: 200px;
    }
    #reg
    {
        background-color: blue;
        font-size: 14px;
        width: 310px;
        height: 30px;
    }
    #form
    {
        width: 400px;
        height: auto;
        margin: auto;
        padding: 20px;
        margin-top: 50px;
        background-color: beige;
    }
    .fn1
    {
        width: 300px;
        height: 25px;
    }
    </style>
</head>
<body>
    <h1 class="head">Clinic Patient Registration </h1>
    <center>
        <div id="form">
    <table>
        <tr>
            <td><p class="fn">Full Name:</p>
            <input class="fn1" type="text" name="full_name"></td>
        </tr>
        <tr>
            <td><p class="fn">Age:</p><input class="fn1" type="number" name="age"></td>
        </tr>
        <tr>   
        </tr>
        <tr>
            <td><p class="fn">Phone Number:</p>
            <input class="fn1" type="number" name="Phone_Number"></td>
        </tr>
        <tr>
            <td><p class="fn">Email Address:</p>
            <input class="fn1" type="Text" name="Email_Address"></td>
        </tr>
<tr>
            <td><p class="fn">Insaurance Provider:</p>
            
                <select class="fn1" name="Select Provider">
                    <option value="Select Provider">Select Provider</option>
                    <option value="Provider A">Provider A</option>
                    <option value="Provider B">Provider B</option>
          
                </select>
            </td>

        <tr>
            <td><p class="fn">Insuarnce Policy Number:</p>
            <input class="fn1" type="Number" name="Insurance_POlicy_Number"></td>
        </tr>
        
      
    </table> 
    
    
</body> 
      <tr><td><h1 class="head">Additional Information </h1></td></tr>


    <table>
        <tr>
            <td><p class="fn">Username:</p>
            <input class="fn1" type="text" name="Username"></td>
        </tr>
        <tr>
            <td><p class="fn">Pssword:</p>
            <input class="fn1" type="text" name="Password"></td>
        </tr>
        <tr>
            <td><p class="fn">Confirm Password:</p>
            <input class="fn1" type="text" name="Confirm Password"></td>
        </tr>



    </table>
    <input id="reg" type="Submit" value="Register">
</div>
</center>


</html>
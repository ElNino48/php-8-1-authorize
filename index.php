<?php 
   session_start();
   // calling access to database files back by checking if the browser was on index.php :
   $_SESSION["1st"] = "-nevergonnagiveuup"; 
   require_once 'layout' . DIRECTORY_SEPARATOR . 'header.php'; // instead of duplication header code ?>
<head>
   <title>Main Page</title>
</head>
<body>
   <h1> Main Page </h1>
   <table id="table1">
      <tr>
         <td class="col1">
            <form id="regform" action="javascript:void(0);" method="post">
               <br></br>  
               <h4>Sign up</h4>
               <table id="table1">
                  <tr>
                     <td id="td10" style="text-align: left; font-size: 1.15rem;">
                        Login<br>
                        Password<br>
                        Confirm Password<br>
                        E-mail<br>
                        Full Name<br>
                     </td>
                     <td id="td50r">
                        <input type="text" required placeholder="Enter your login" id="login" form="regform" minlength="6" maxlength="200" autofocus="autofocus"><br>
                        <input type="password" required placeholder="Enter your password" id="password" form="regform" minlength="6" maxlength="200" pattern="^.*(?=.*\d.*\d)(?=.*[a-zA-Z].*[a-zA-Z]).*$" oninput='checkpasswordconfirmation();'><br>
                        <input type="password" required placeholder="Confirm your password" id="confirm_password" form="regform" minlength="6" maxlength="200" pattern="^[a-zA-Z0-9]+$" oninput='checkpasswordconfirmation();'><br>
                        <input type="email" required placeholder="Enter your e-mail" id="email" maxlength="200" form="regform"><br>
                        <input type="text" required placeholder="Enter your full name" id="name" form="regform" minlength="2" maxlength="200" pattern="^[a-zA-Z]+$"><br>
                     </td>
                     <td id="50l">
                        <span id="loginMessage"></span><br>
                        <span id="passwordMessage"></span><br>
                        <span id="confirmpasswordMessage"></span><br>
                        <span id="emailMessage"></span><br>
                        <span id="nameMessage"></span><br>
                        <span id="regMessage"></span><br>
                     </td>
                  </tr>
               </table>
               <button type="sumbit" form="regform" class="reg" id="reg">Sign up</button>
            </form>
         </td>
         <td class="col2">
            <form id="logform" action="javascript:void(0);" method="post"> 
            <h4>Log in</h4>
               <h4></h4>
               <table id="table1">
                  <tr>
                     <td id="td50r">
                        <input type="text" required placeholder="Enter login" id="login1" form="logform" minlength="6" maxlength="200"><br>
                        <input type="password" required placeholder="Enter password" id="password1" form="logform" minlength="6" maxlength="200" pattern="^.*(?=.*\d.*\d)(?=.*[a-zA-Z].*[a-zA-Z]).*$"><br>
                        <label><input type="checkbox" class="password-checkbox">show password</label>
                     </td>
                     <td id="td50l">
                        <span id="loginMessage1"></span><br>
                        <span id="passwordMessage1"></span><br>
                     </td>
                  </tr>
               </table>
               <button type="submit" form="logform" class="auth" id="auth">Log in</button>
            </form>
         </td>
      </tr>
   </table>
   <?php require_once 'layout' . DIRECTORY_SEPARATOR . 'footer.php'; // instead of duplication footer code

    <div>
      <h1 style="text-align: center;">Club Login Page</h1>

      <p style="text-align: center;">Welcome to the online self management system for our member clubs.</p>

      <p style="text-align: center;">If you ave registered, please login below.  If you are yet to register, please use the link above.</p>

      <p style="text-align: center;">We will be adding more functionality over time, regards</p>

      <p style="text-align: center;">The CPL Committee</p>

    </div>

    <div class="container">
      <form id="login" action="index.php" method="post">
        <div>
          <input type="email" id="usrname" name="usrname" value="<?php echo $email; ?>" required />
          <label for="usrname">Email</label>
        </div>
        <div>
          <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
          <label for="psw">Password</label>
        </div>

        <div>
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
    </div>

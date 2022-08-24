<?php include 'inc/header.php' ?>
<?php include 'app/controllers/users.php' ?>

    <div id="signup-box">
        <div style="text-align: center; padding-top:2rem">
          <h1>Sign up</h1>
        </div>
          
          <form action="register.php" class="signup-fields" method="POST">
            <input type="text" name="username" placeholder="Username" />
            <!-- <input type="text" name="lastname" placeholder="Lastname" /> -->
            <input type="email" name="email" placeholder="E-mail" />
            <input type="password" name="password" placeholder="Create-Password" />
            <input type="password" name="password2" placeholder="Confirm-password" />
            <!-- <div style="display: flex; justify-content:space-around; align-items: center; width: 80%;">
                <label for="gender">Gender:</label>
                <div>
                  <label for="male">Male</label>
                  <input type="radio" name="gender" id="">
                </div>
                
                <div>
                  <label for="male">Female</label>
                  <input type="radio" name="gender" id="">
                </div>
            </div> -->
            
            <input type="submit" name="signup_submit" value="Create Account" />
            <p>Already have an account? <a href="login.php">Log in</a></p>
          </form>

        </div>

      </div>
<?php include 'inc/footer.php' ?>
<h1> This is the registration page.  </h1>
<br /> 
 <!-- the form will be submitted in the same url as the input --> 
    <form action="" method="post" class="form">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="username" value="<?php if($errorValue["username"] === $_POST["username"]){echo $errorValue["user_value"];} ?>" >
        <?php if($errorValue["username"] !== $_POST["username"]){echo $errorValue["username"];} ?>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email"  value="<?php if($errorValue["email"] === $_POST["email"]){echo $errorValue["email_value"];} ?>">
        <?php if($errorValue["email"] !== $_POST["email"]){echo $errorValue["email"];} ?>
        <label for="password">Password</label>
        <input type="password" name="password">
        <?php echo $errorValue["password"] ?>
        <input type="submit" value="Register" class="submit">
    </form>


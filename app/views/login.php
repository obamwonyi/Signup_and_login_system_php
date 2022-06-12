<h1>This is the login page</h1>
<br /> 
<!-- the form will be submited to the same url as the input --> 
<form action="" method="post" class="form">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email" value="<?php if( isset($array["email"]) ){echo $array["email"]; } ?>">
        <?php  if(isset($array["email_error"])){echo $array["email_error"];} ?>
        <label for="password">Password</label>
        <input type="password" name="password">
        <?php  if(isset($array["password_error"])){echo $array["password_error"];} ?>
        <input type="submit" value="login" class="submit">
</form>
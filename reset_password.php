<?php
include __DIR__.'/config.php';
include './includes/database.php';
include './includes/functions.php';
//include_once './includes/process.php';
//include_once './includes/functions.php';

// Validate the token (check in your database)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $password = password_hash($new_password, PASSWORD_BCRYPT);
    $updateQuery = 'UPDATE `logintbl` SET ' . " "
                    . " `password` = '$password' "
                    . " WHERE `reset_token`= '$token' limit 1";
//echo $updateQuery;die;
        $exe = mysqli_query($link, $updateQuery);
        if ($exe) {
            $msg = "Password reset successfully!";
            header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=success');
        }else{
            $msg = "Invalid or expired token";
            header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=warning');
            
                        
        }
}

if (isset($_GET['token'])) {
    $email = filter_var(urldecode($_GET['account']), FILTER_SANITIZE_EMAIL);
    $token = $_GET['token'];
    // Retrieve the user associated with this token (implement your own logic)
    $updateQuery = 'SELECT * from `logintbl` WHERE ' . " "
                    . " `reset_token` = '$token' "
                    . " AND `email`= '$email' limit 1";
//echo $updateQuery;die;
        $exe = mysqli_query($link, $updateQuery);
        if ($exe) {
            if (mysqli_num_rows($exe) > 0) {
                while ($row = mysqli_fetch_assoc($exe)) {
//                    print_r($row);die;
//                    $returnOTP['id'] = $row['id'];
                    $returnOTP['reset_token'] = $row['reset_token'];
                }
            }else{
                $msg = "Invalid or expired token";
                header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=warning');
            }
        }else{
            $msg = "Invalid email or hack attempt";
            header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=danger');
                        
        }
}
include_once './includes/header.php';
?>
    <section class=" jarallax">
        <div class="de-gradient-edge-top"></div>

        <div class="container position-relative z1000">
            <div class="row gx-5">

                <div class="col-lg-8 offset-lg-2">

                    <div class="d-sch-table">
                        <!--<h2 class="wow fadeIn text-center">Login</h2>-->
                        <h2 class="wow fadeIn text-center" style="font-size: 22px!important;">
                            Reset Your Password</h2>
                        <div class="de-separator"></div>
                        <div class="contact-form">
                            <p class="lead text-center">
                                <?php if (!empty($_GET) && isset($_GET['type'])): ?>
                                <div class="row mb-20">
                                    <div class="col-12 text-<?php echo $_GET['type'] ?>">
                                        <?php echo htmlentities($_GET['msg']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </p>

                            <form action="reset_password.php" method="POST">
                                <div class="form-group row">

                                    <div class="col-12">
                                        <!--        <label for="email">Enter your email:</label>-->
                                        <input type="password" id="password" class="form-control" placeholder="New Password" name="new_password" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <button type="submit" class="default_btn" >Reset Password</button>
                                    </div>
                                </div>
                                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                            </form>




                        </div>

                    </div>
                    <div class="d-deco"></div>
                </div>
            </div>
        </div>
</div>
<div class="de-gradient-edge-bottom"></div>
</section>

<!--    <h2>Reset Your Password</h2>
    <form action="update_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>-->
<!-- footer begin -->
<?php
include_once './includes/footer.php';
?>

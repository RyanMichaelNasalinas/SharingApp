<?php require APPROOT . '/views/inc/header.php';?>
    <div class="row mb-5">
        <div class="col-6-md mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an account</h2>
                <p>Please fill out this form to register</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <!--Name-->
                    <div class="form-group">
                        <label for="name">Name: <sup class="text-danger">*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo $data['name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                    </div>
                <!--Email-->
                    <div class="form-group">
                        <label for="email">Email: <sup class="text-danger">*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                <!--Password-->
                <div class="form-group">
                        <label for="password">Password: <sup class="text-danger">*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>
                <!--Confirm Password-->
                <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup class="text-danger">*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                           <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? login here</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>
    
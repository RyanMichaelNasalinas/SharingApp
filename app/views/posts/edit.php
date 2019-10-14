<?php require APPROOT . '/views/inc/header.php';?>
        <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><b>Back</b></a>
            <div class="card card-body bg-light mt-5">
                <h2>Edit Posts</h2>
                <p>Create a new posts</p>
                <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
                <!--Email-->
                    <div class="form-group">
                        <label for="title">Title: <sup class="text-danger">*</sup></label>
                        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
                    </div>

                <!--Password-->
                <div class="form-group">
                        <label for="body">Body: <sup class="text-danger">*</sup></label>
                        <textarea name="body" class="form-control form-control-lg 
                        <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?>
                        </textarea>
                        <span class="invalid-feedback"><?php echo $data['body_error']; ?></span>
                    </div>
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
            </div>
        
    
<?php require APPROOT . '/views/inc/footer.php';?>
    
<?php require APPROOT . '/views/inc/header.php';?>
<?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
         <a href="<?php echo URLROOT;?>/posts/add" class="btn btn-primary float-md-right">Add Posts</a>
        </div>
    </div>
    <?php foreach($data['posts'] as $post): ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Written By: <?php echo $post->name; ?> Posted on <?php echo $post->postsCreated; ?>
            </div>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">See More</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php';?>
    
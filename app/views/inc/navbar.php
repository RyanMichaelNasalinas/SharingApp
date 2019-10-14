
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-1">
<div class="container">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  <span class="navbar-toggler-icon"></span>Menu
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
      </li>   
    </ul>

    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])): ?>
    <li class="nav-item">
        <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['user_name']; ?></a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      </li>
    <?php else :?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">login</a>
      </li> 
  <?php endif; ?>
    </ul>
  </div>
  </div>  
</nav>

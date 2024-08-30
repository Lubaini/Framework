<?php view('templates/header');?>
<body class="text-center" style="background-image: url('assets/img/student.JPG');
 background-size: cover; backdrop-filter: blur(30px);">
<form class="container mx-auto" style="max-width:750px; margin-top:13%;" method="post" action="<?php _here();?>">

<div class="mt-4 text-light">
<h1 class="text-center text-light">Welcome To OnlinePortal</h1>
<hr class="bg-light">
<p> <i class="bi bi-person-circle"></i> Student Portal</p>
</div>
<div class="row mt-1 g-3">
    <div class="col">
      <p class="text-start text-light"><i class="bi bi-envelope"></i> Email</p>
      <input type="email" style="height: 50px;" id="email" name="email" class="form-control" placeholder="Enter your email">
      <p class="emailErr text-danger fw-bold text-start"></p>
    </div>
    <div class="col">
      <p class="text-start text-light"><i class="bi bi-lock"></i> Password</p>
      <input type="password" style="height: 50px;" id="password" name="password" class="form-control" placeholder="Enter your password">
      <p class="passwordErr text-danger fw-bold text-start"></p>
    </div>
  </div>
  <button class="w-100 btn btn-lg mt-4 btn-warning text-light" id="login" type="button">Sign in <i class="bi bi-box-arrow-in-right"></i></button>
  
<div class="mt-1 d-flex justify-content-center container">
<a href="<?php echo URL('new');?>" class="text-decoration-none text-light mt-5"><i class="bi bi-key"></i> Forgot password?</a>
</div>
</form>
<?php view('templates/footer');?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
        <style>

</style>
    </head >
    
<body  class="cssa" align="center" style="background-image: url('<?php echo base_url().'image/pexels-engin-akyurt-2943603.jpg'?>')">

<div class="container" style="
    margin-left: 500px;
    margin-top: 200px;
">
   
        <div class="" align="center">
           <div class="card" style="width: 18rem;">
              <div class="card-header">
                login here 
              </div>
         <form actiom="http://localhost/myschool/index.php/user/login" name="login form" method="post">
              <div class="card-body" align="center">
               <p class="card-text">plass fill the login details</p>
                             
               <div class="form-group">
                   <lable for="username">User Name
                   <input type="text" name="username" id="username" value="" class="form-control" placeholder="username">
               </lable></div>
               <div class="form-group">
                   <lable for="password">password
                   <input type="password" name="password" id="password" value="" class="form-control" placeholder="password">
               </lable></div>
              
               <input type="submit" value="login" name="submit" calss="btn  btn-primary">
              </div>   
          </form>
         
            </div>
        </div>
    </div>
   
</body>
</html>
<style>
.cssa {
  background-image: url("/image.jpg");
  background-size: 1020px;
  width: 300px;
  height: 300px;
 
}
</style>
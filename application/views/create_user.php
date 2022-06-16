<html>
    <head>
        <title>create_user</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    </head>
<body>
    <div class="container" style="margin-top:3%;">
   
        <div class ="col-md10">
           <div class="card" style="width: 35rem;margin-top=3%;margin-bottom:4%">
              <div class="card-header">
                Creating New User              </div>
         <form actiom="<?php echo base_url().'index.php/user/dashbord' ;?>" name="user form" method="post"  >
              <div class="card-body register">
               <p class="card-text">Pleass fill the details</p>
               <?php
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>";
                 }
      
                  ?>
               <div class="form-group">
                   <lable for="fname">First Name</label>                 
                   <input type="text" name="fname"  id="fname"  value="<?php echo set_value('fname'); ?>" class="form-control" placeholder="First Name" >
               </div>
               <div class="form-group">
                   <lable for="lname">last Name</label>                 
                   <input type="text" name="lname"  id="lname"  value="<?php echo set_value('lname'); ?>" class="form-control" placeholder="Last Name" >
               </div>
               <div class="form-group">
                   <lable for="username">User Name</label>                 
                   <input type="text" name="username"  id="username"  value="<?php echo set_value('username'); ?>" class="form-control" placeholder="User Name" >
               </div>
               <div class="form-group">
                   <lable for="email">Email</label>
                   <input type="text" name="email" id="email"  value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" >
               </div>
               <div class="form-group">
                   <lable for="password">Password</label>
                   <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" >
               </div>
               <div class="form-group">
                   <lable for="conpassword"> Conform password</label>
                   <input type="text" name="conpassword" id="conpassword" value="<?php echo set_value('conpassword'); ?>" class="form-control" placeholder="Conform password" >
               </div>
               
               <input type="submit" value="Create User" name="submit" class="btn  btn-primary" style="float:rignt;margin-left:70%;margin-top:3%">
              </div>   
              
           </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>
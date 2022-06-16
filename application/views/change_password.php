<html>
    <head>
        <title>change password</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
    </head>
<body>
    <div class="container">
           <div class ="col-md10">
           <div class="card" style=" width: 30rem; margin-top: 5%;">
              <div class="card-header">
                You can change password 
              </div>
              <form actiom="<?php echo base_url().'index.php/user/login' ;?>" name="login form" method="post"  >
              <div class="card-body register">
               <?php $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>"; }      
                  ?>              
               <div class="form-group">
                   <lable for="currentpassword">Current Password</label>
                   <input type="password" name="currentpassword" id="currentpassword"  value="" class="form-control" placeholder="current password" >
               </div>
               <div class="form-group">
                   <lable for="newpassword">New Password</label>
                   <input type="password" name="newpassword" id="newpassword" value="" class="form-control" placeholder="New Password" >
               </div>
               <div class="form-group">
                   <lable for="conpassword"> Conform New Password</label>
                   <input type="text" name="conpassword" id="conpassword" value="<?php echo set_value('conpassword'); ?>" class="form-control" placeholder="conform new password" >
               </div>               
               <input type="submit" value="changepassword" name="submit" calss="btn  btn-primary" >
               </div>   
              </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>
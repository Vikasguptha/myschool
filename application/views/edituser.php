<html>
    <head>
        <title>user details</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">      
</head>
<body >
    <?php  
//       echo ' <pre>';     print_r($session_data);
       ?>

    <div class="container">
         <div class="col-md-8">
        <div class="card mt-4">
           <div class="card-header">
            Edit User
  </div>
   <form action="<?php echo base_url().'index.php/user/updateuser'?>" name="edituser"  id="edituser" method="post" autocomlete="off" > 
       <div class="card-body userdetails">
        
          <?php
          $msg=$this->session->flashdata('msg');
              if($msg!=""){
             echo "<div class='alart aleart-success'>$msg</div>";
            }
      
              ?>
              <div class="form-group">
             
               <input type="hidden"name="user_id"id="name_id" value="<?php   echo $h['user_id']?>" class="form-control" placeolder ="user_id" readonly>
              
              </div>
               <div class="form-group">
              <label for="username">UserName</label>
               <input type=""name="username"id="name" value="<?php   echo $h['username']?>" class="form-control" placeolder ="username" readonly>
              
              </div>
               
                 <div class="form-group">
                <label for="email">Email </label>
                 <input type="email"name="email"id="email"value="<?php   echo $h['email']?>"class="form-control" placeolder ="email"readonly>
                
                </div>
                <div class="form-group">
              <label for="fname">FirstName</label>
               <input type=""name="fname"id="fname" value="<?php   echo $h['fname']?>" class="form-control" placeolder ="fname" >
              
              </div>
               
                 <div class="form-group">
                <label for="lname">Last Name </label>
                 <input type="lname"name="lname"id="lname"value="<?php   echo $h['lname']?>"class="form-control" placeolder ="lname">
                
                </div>
                    
                </div>
                 <div class="form-group">
                 <input type="submit" value="update" name="submit" calss="btn  btn-primary" style=" margin-left: 70%; width: 20%;">
                 </div>
                

     
        </div>
    </form>

</div>
</div>
</div>  
<div style="height:5%">
                </div>
</body>
    </html>
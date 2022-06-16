<html>
    <head>
        <title>teacher details</title>
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
           Edit Teacher
  </div>
   <form action="<?php echo base_url().'index.php/teacher/updateteacher/'.$h['photo']?>" name="editteacher"  id="editteacher" method="post" autocomlete="off"  enctype="multipart/form-data" > 
       <div class="card-body teacherdetails">
                   <?php
          $msg=$this->session->flashdata('msg');
              if($msg!=""){
             echo "<div class='alart aleart-success'>$msg</div>";
            }
      
              ?>
              <div class="form-group">
              <label for="teacher_id">Emp Id</label>
               <input type=""name="emp_id"id="emp_id" value="<?php   echo $h['emp_id']?>" class="form-control" placeolder ="emp_id" readonly>
              
              </div>
              <div class="form-group">
      
               <input type="hidden"name="teacher_id"id="name_id" value="<?php   echo $h['teacher_id']?>" class="form-control" placeolder ="teacher_id" readonly>
              
              </div>
               <div class="form-group">
              <label for="dob">Date of Birth</label>
               <input type=""name="dob"id="name" value="<?php   echo $h['dob']?>" class="form-control" placeolder ="dob" readonly>
              
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
                <label for="lname">last name </label>
                 <input type="lname"name="lname"id="lname"value="<?php   echo $h['lname']?>"class="form-control" placeolder ="lname">
                
                </div>
                <div>
             
             <img src="<?php echo base_url().'upload/'. $h['photo']?>"  style="width:300px">
     </div>       
             <div class="form-group">
                <lable for="photo">change photo</label>
                <input type="file" id="profile_image" name="profile_image" size="33" />
            </div>
                </div>
                 <div class="form-group">
                 <input type="submit" value="update" name="submit" calss="btn  btn-primary" >

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
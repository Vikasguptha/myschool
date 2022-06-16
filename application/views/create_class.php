<html>
    <head>
        <title>create_class</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    </head>
<body>
    <div class="container">
   
        <div class ="col-md10">
           <div class="card" style="width: 28rem ; margin-top: 4%;">
              <div class="card-header">
                Creating New Class              </div>
         <form actiom="<?php echo base_url().'index.php/classes/create_class' ;?>" name="user form" method="post"  >
              <div class="card-body register">
               <p class="card-text">Pleass fill the details</p>
               <?php
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>";
                 }
      
                  ?>
               <div class="form-group">
                   <lable for="class_name">Class Name</label>                 
                   <input type="text" name="class_name"  id="class_name"  value="<?php echo set_value('class_name'); ?>" class="form-control" placeholder="Class Name" >
               </div>
               <div class="form-group">
                   <lable for="class_number">Class Number</label>                 
                   <input type="text" name="class_number"  id="class_number"  value="<?php echo set_value('class_number'); ?>" class="form-control" placeholder="Class Number" >
               </div>
               
               
               
               <input type="submit" value="Create Class" name="submit" calss="btn  btn-primary" style="float:right;margin-bottom:3%" >
              </div>   
          </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>
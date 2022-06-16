<html>
    <head>
        <title>create_user</title>
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    </head>
<body>
    <div class="container">
   
        <div class ="col-md10">
           <div class="card" style=" width: 30rem; margin-top: 5%;">
              <div class="card-header">
                Add New subject               </div>
         <form actiom="<?php echo base_url().'index.php/user/dashbord' ;?>" name="user form" method="post"  >
              <div class="card-body register">
               <p class="card-text">plass fill the details</p>
               <?php
                 $msg=$this->session->flashdata('msg');
                if($msg!=""){
                echo "<div class='alart aleart-success'>$msg</div>";
                 }
      
                  ?>
               <div class="form-group">
                   <lable for="subject">Subject</label>                 
                   <input type="text" name="subject"  id="subject"  value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="subject" >
               </div>
               
               <div class="form-group">
               Teacher name     
                <select type="text" name="teacher_id"  id="teacher_id"  value="<?php echo set_value('teacher_id'); ?>" class="form-control" placeholder="teacher_id" >
               
               <option value="">Select teacher</option>  <?php
  
              foreach($teacher as $row)
               {
                  echo '<option value="'.$row['teacher_id'].'">'.$row['fname'].'</option>';
                }
    ?></select>  </div>
               <div class="form-group">
                   <lable for="totalmarks">Total marks</label>
                   <input type="text" name="totalmarks" id="totalmarks"  value="<?php echo set_value('totalmarks'); ?>" class="form-control" placeholder="totalmarks" >
               </div>
              
               <input type="submit" value="Add subject" name="submit" calss="btn  btn-primary" style="margin-left: 60%;">  
                        </div>   
          </form>
         
            </div>
        </div>
    </div>
    <div style="height:5%">
                </div>
</body>
</html>
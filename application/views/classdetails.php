<html>
<head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>All class details</title>  
      <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>"> 
   </head>  
   <table class="center" border="1">
   <a class="btn btn-lg btn-primary"  style="margin-left:33%;margin-top:5%;" href="<?php echo base_url().'index.php/section/create_section/'?>"><i class="fa fa-plus"></i> Add Section</a></div>

        <tbody style="background: white">  
         <tr>  
            <td class="p"style="width:21%"><b>Class Name</td>  
            <td class="p" style="width:26%"><b>Section Name</td> 

           
         </tr> 
         <div class="col-md-8">
        
         <div class="card-header" style="

    width: 58.7%;
    margin-left: 6%;
    background: gainsboro;
">
 class details
</div>

         <?php  
           
         foreach ($section as $row)  
         {  
            ?><tr>  
            <td><a class="nav-link" ><?php echo $row->class_id;?></a></td>  
            <td><a class="nav-link"href="<?php echo base_url().'index.php/classes/sectiondetails/'.$row->section_id?>" ><?php echo $row->section_name;?></a></td>
        </tr>  

         <?php }  
         ?>  
         </div>
         </div>
      </tbody>  
   </table>  
         </form>
<body>  
<div style="height:5%">
                </div>
</body>  
</html>  
<style>
   .center {
  margin-left: 5%;
  margin-right: auto;
}
.p{padding: 10px;}
   </style>
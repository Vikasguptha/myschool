<html>
<head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>total class</title>  
      <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>"> 
   </head>  
   <table  class="center"border="1" >
   <a class="btn btn-lg btn-primary"  style="margin-left:25%;margin-top:5%;" href="<?php echo base_url().'index.php/classes/create_class/'?>"><i class="fa fa-plus"></i> Add Class</a></div>

        <tbody style="background: white">  
         <tr>  
         <td class="p" style="width:21%"><b>class_id</td> 
            <td class="p"  style="width:26%"><b>class_name</td>
           
         </tr> 
         <div class="col-md-8">

         <div class="card-header" style="
    
    width: 46%;
    margin-left: 6%;
    background: gainsboro;
">
 Total Class
</div>
         <?php  
         foreach ($h->result() as $row)  
         { 
            ?><tr>  
            <td><a class="nav-link"><a class="nav-link" href="<?php echo base_url().'index.php/classes/classd/'.$row->class_id?>"><?php echo $row->class_id;?></td>  
            <td><a class="nav-link"><a class="nav-link" href="<?php echo base_url().'index.php/classes/classd/'.$row->class_id?>"><?php echo $row->class_name;?></a></td>

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
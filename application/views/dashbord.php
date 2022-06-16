<!DOCTYPE html>
<html>
<head>
<title>Dashbord</title>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
 <link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.js'?>">
 
</head>

<body    class="cssa" align="center" style="background-image: url('<?php echo base_url().'image/Kid-Learning.jpg'?>')" >


    <nav class="navbar navbar-expand-md navbar-light bg-light " >
    <a class="navbar-brand pb-2" href="<?php echo base_url().'index.php/user/dashbord '?>">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url().'index.php/user/dashbord '?>">Home <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Student </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/student/addstudent ';?>">Add student</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/student/totalstudents '?>">Total students</a></li>
                    
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Teacher </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/teacher/addteacher ';?>">Add Teacher</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/teacher/totalteachers ';?>">Total Teachers</a></li>
                    
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admin User </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/create_user ';?>">Create New User</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/all_users ';?>">All User Details</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/user/change_password ';?>">change password</a></li>
                </ul>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Class </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/classes/create_class ';?>">Add class</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/classes/allclass ';?>">All class</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/section/create_section ';?>">Add Section</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> marks/subject </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/marks/addmarks ';?>">Add Marks</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url().'index.php/subject/addsubject ';?>">Add subject</a></li>

                </ul>
            </li>
            <li style="float:right;margin-left:490px"><a class="nav-link"  href="<?php echo base_url().'index.php/user/edituser/'.$this->session->userdata['user']['user_id']?>"> welcome <?php print_r($this->session->userdata['user']['username']);?>  </a></li>
            <li class="nav-item active" style="position:absolute;right:20px;">
                <a class="nav-link"  href="<?php echo base_url().'index.php/user/logout '?>">logout <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<style>
.navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top:-6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 

  </style>

</body>
</html>
<style>
.cssa {
  
  background-size: 1400px;
  width:100%;
  height: 300px;
 
}
.logout{
    float:right;
}
</style>
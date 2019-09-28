<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

    $uid = $_SESSION['id'];
    $ret = mysqli_query($conn,"SELECT * FROM users WHERE id = '$uid' ");
    $row = mysqli_fetch_assoc($ret);
    $name = $row['fname'];
    $image = $row['image'];

?>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="profileimages/<?php echo $image;?>" class="img-responsive" alt="">
        </div>

        <div class="profile-usertitle">
            <h5><?php echo $name; ?></h5>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>

        </div>

        <div class="clear"></div>
    </div>
    
    <div class="divider"></div>
    
    <ul class="nav menu">
        <li class="active">
            <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
            <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="add-expense.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                </a></li>
                <li><a class="" href="manage-expense.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                </a></li>       
            </ul>
        </li>
       
        <li><a href="reports.php"><em class="fas fa-book">&nbsp;</em> Generate Expenses Report</a></li>

        <li><a href="profile.php"><em class="fa fa-user">&nbsp;</em> Profile</a></li>

        <li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        
        <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

    </ul>
</div>
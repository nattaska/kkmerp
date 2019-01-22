<?php 
include('include/header.php'); 
/*Check for authentication otherwise user will be redirects to main.php page.*/
// print_r($user);
?>

    <!-- Left Panel -->
    <?php include('include/leftpanel.php'); ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('include/rightheader.php'); ?>
        <!-- /#header -->
    </div>
    <!-- Right Panel -->
    <!-- /#right-panel -->

    <!-- Scripts -->
    <?php include('include/footer.php'); ?>
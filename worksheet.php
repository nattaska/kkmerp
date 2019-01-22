<?php 
include('include/header.php'); 
include_once("model/Timesheet.php");
$wkModel = new Timesheet();
$timesheet=$wkModel->getTimesheetsByUser($user["code"],'2018-11-03','2018-11-10');
?>
    <!-- Left Panel -->
    <?php include('include/leftpanel.php'); ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('include/rightheader.php'); ?>
        <!-- /#header -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Working Time</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Check In</th>
                                            <th scope="col">Check Out</th>
                                            <!-- <th scope="col">Handle</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        foreach ( $timesheet as $data ) {
                                            print "<tr>";
                                            print "    <th scope='row'>".$data["date"]."</th>";
                                            print "    <td>".$data["chkin"]."</td>";
                                            print "    <td>".$data["chkout"]."</td>";
                                            print "</tr>";
                                            // print $key . " = " . $value."</br>" ;
                                        }

                                        ?>
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
<?php include('include/footer.php'); ?>
    
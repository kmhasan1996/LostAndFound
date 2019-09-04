<?php
    include("Navbar.php");
    include("connection.php");
    error_reporting(0);
?>

      <div class="container-fluid">
       <h2>User List</h2>
       <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query1 ="SELECT * FROM userinfo";
                    $data1 = mysqli_query($conn,$query1);
                    
                    while ( $result = mysqli_fetch_assoc($data1)) {

                            ?>
                             <tr>
                                <td ><?php echo $result['first_name']; ?></td>
                                <td ><?php echo $result['last_name']; ?></td>
                                <td ><?php echo $result['dob']; ?></td>
                                <td ><?php echo $result['email']; ?></td>
                                <td ><?php echo $result['mobno']; ?></td>
                                <td ><?php echo $result['area'].", ".$result['city']; ?></td>
                               
                                
                            </tr>
                            <?php
                            
                        		
                     }
                ?>
               
            
            </tbody>
        </table>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <?php
include ("Footer.php");
?>
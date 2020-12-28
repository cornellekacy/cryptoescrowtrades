<?php   include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php   include 'sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                     
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
             <table class="table table-striped">
              <p style="color: green">All userns in the system.</p>
            <thead>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php
             include 'conn.php';
// Check connection
             if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM user ";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {?>

                <tr>
                  <td><?php echo $row["username"] ?></td>
                  <td> <?php echo $row["email"] ?></td>

                
                  <td><a class="btn btn-danger" href="deleteusers.php?id=<?php echo $row["user_id"]; ?>">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    Delete
                  </a>
              </tr>



              <?php 

            }
          } else {
            echo "0 results";
          }

          mysqli_close($link);
          ?>
        </tbody>

      </table> 
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
 <?php include 'footer.php'; ?>
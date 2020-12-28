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

                     <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                             <p style="color: green">All Transactions</p>
                                <div class="table-responsive">
                                    <table id="multi_col_order"
                                        class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>FullName</th>
                                                <th>Amount</th>
                                                <th>Email</th>
                                                <th>Delivery Date</th>
                                                <th>Payment Method</th>
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
$sql = "SELECT * FROM transaction";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
              while($row = mysqli_fetch_assoc($result)) {?>
                                            <tr>
                  <td><?php echo $row["trans_id"] ?></td>
                  <td> <?php echo $row["name"] ?></td>
                  <td><?php echo $row["currency"] ?> <?php echo $row["price"] ?></td>
                  <td> <?php echo $row["email"] ?></td>
                  <td><?php echo $row["expected"] ?></td>
                  <td> <?php echo $row["payment"] ?></td>

                   <!-- <td><a class="btn btn-success" href="viewfull.php?id=<?php echo $row["transaction_id"]; ?>">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    View
                  </a>
                </td> -->
                  <td><a class="btn btn-danger" href="deleteall.php?id=<?php echo $row["transaction_id"]; ?>">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    Delete
                  </a>
                </td>
               
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
 <?php include 'footer.php'; ?>
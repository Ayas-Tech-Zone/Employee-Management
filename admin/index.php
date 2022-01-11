 <?php
    error_reporting(0);
    require_once('../assets/constants/config.php');
    require_once('../assets/constants/check-login.php');

    require_once('../assets/constants/fetch-my-info.php');
    ?>

 <?php include('include/head.php') ?>
 <?php include('include/header.php') ?>
 <?php include('include/sidebar.php'); ?>

<link href="fullcalendar/lib/main.min.css" rel="stylesheet">
 <!-- ============================================================== -->
 <!-- end navbar -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- left sidebar -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- end left sidebar -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- wrapper  -->
 <!-- ============================================================== -->
 <div class="dashboard-wrapper">
     <div class="dashboard-ecommerce">
         <div class="container-fluid dashboard-content ">
             <!-- ============================================================== -->
             <!-- pageheader  -->
             <!-- ============================================================== -->
             <div class="row">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="page-header">
                         <h2 class="pageheader-title"> Dashboard </h2>
                         <!--  <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                -->
                         <div class="page-breadcrumb">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                     <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- ============================================================== -->
             <!-- end pageheader  -->
             <!-- ============================================================== -->
           
             <div class="ecommerce-widget">

                 <div class="row">
                     <!-- ============================================================== -->
                     <!-- sales  -->
                     <!-- ============================================================== -->
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                         <div class="card border-3  bg-primary">
                             <div class="card-body">
                                 <h5 class="text-white">Total Users</h5>
                                 <div class="metric-value d-inline-block">
                                     <?php

                                        $nume1 = $conn->query("SELECT COUNT(*) FROM admin where delete_status='0' AND desig!='0'")->fetchColumn();
                                        /*echo "<br>Number of records : ". $nume;
*/

                                        ?>

                                     <h1 class="mb-1 text-white"><?php echo $nume1; ?></h1>
                                 </div>
                                 <div class="metric-label d-inline-block float-right text-success font-weight">
                                     <i class="fa fa-database text-white"></i><!-- <span class="ml-1">5.86%</span> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- ============================================================== -->
                     <!-- end sales  -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- new customer  -->
                     <!-- ============================================================== -->
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                         <div class="card border-3 bg-danger">
                             <div class="card-body">
                                 <h5 class="text-white">Total Role</h5>
                                 <div class="metric-value d-inline-block">
                                     <?php

                                        $nume2 = $conn->query("SELECT COUNT(*) FROM groups where delete_status='0'")->fetchColumn();
                                        /*echo "<br>Number of records : ". $nume;
*/

                                        ?>


                                     <h1 class="mb-1 text-white"><?php echo $nume2; ?></h1>
                                 </div>
                                 <div class="metric-label d-inline-block float-right text-success font-weight">
                                     <i class="fa fa-list text-white"></i><!-- <span class="ml-1">5.86%</span> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- ============================================================== -->
                     <!-- end new customer  -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- visitor  -->
                     <!-- ============================================================== -->
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                         <div class="card border-3 bg-success">
                             <div class="card-body">
                                 <h5 class="text-white">Total Borrow Amount</h5>
                                 <div class="metric-value d-inline-block">
    <?php
   

   
    $nume5 = $conn->query("SELECT SUM(amount) AS total FROM borrow WHERE delete_status = '0'")->fetchColumn();
    ?>

    
    <h1 class="mb-1 text-white"><?php echo number_format($nume5, 2); ?></h1>
</div>
                                 <div class="metric-label d-inline-block float-right text-success font-weight">
                                     <i class="fas fa-credit-card text-white"></i><!-- <span class="ml-1">5%</span> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- ============================================================== -->
                     <!-- end visitor  -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- total orders  -->
                     <!-- ============================================================== -->
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                         <div class="card bg-warning">
                             <div class="card-body">
                                 <h5 class="text-white">Total Paid Salary</h5>
                                 <div class="metric-value d-inline-block">
                                     <?php

                                        $nume6 = $conn->query("SELECT SUM(final) AS total FROM salary W")->fetchColumn();
                                        /*echo "<br>Number of records : ". $nume;
*/

                                        ?>

                                     <h1 class="mb-1 text-white"><?php echo number_format($nume6, 2); ?></h1>
                                 </div>
                                 <div class="metric-label d-inline-block float-right text-success font-weight">
                                     <i class="fab text-white fa-stack-exchange
"></i><!-- <span class="ml-1">5%</span> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                  
                  
                 </div>

                 <div class="row">
                     <!-- ============================================================== -->

                     <!-- ============================================================== -->

              <div class="col-md-12">
                    <div class="card border-0 shadow rounded-0">
                        <div class="card-body">
                         <div id="bar" style="width: 900px; height: 500px;"></div>

                        </div>
                    </div>
                </div>
            
            
     
         <!-- Event Details Modal -->
         
                     <!-- ============================================================== -->
                     <!-- end recent orders  -->


                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- customer acquistion  -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- end customer acquistion  -->
                     <!-- ============================================================== -->
                 </div>
                 <!-- ============================================================== -->
                 <!-- end sales traffice country source  -->
                 <!-- ============================================================== -->
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- footer -->
         <!-- ============================================================== -->
         <?php include('include/footer.php'); ?><!-- ============================================================== -->
         <!-- end footer -->
         <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- end wrapper  -->
     <!-- ============================================================== -->
 </div>
 <!-- ============================================================== -->
 <!-- end main wrapper  -->
 <!-- ============================================================== -->
 <!-- Optional JavaScript -->
 <!-- jquery 3.3.1 -->
 <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
 <!-- bootstap bundle js -->
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
 <!-- slimscroll js -->
 <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
 <!-- main js -->
 <script src="assets/libs/js/main-js.js"></script>
 <!-- chart chartist js -->
 <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
 <!-- sparkline js -->
 <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
 <!-- morris js -->
 <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
 <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
 <!-- chart c3 js -->
 <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
 <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
 <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
 <script src="assets/libs/js/dashboard-ecommerce.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 
 
  <script src="fullcalendar/lib/main.min.js"></script>
<?php
$sql = "SELECT  * FROM tbl_invoice i
WHERE i.delete_status = 0 ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();


// $sql = "SELECT * FROM `quot_inv_items` where delete_status=0";   
$i = 0;
$display_appoint = array();
$data = '';
$sched_res = [];
// $stmt = $conn->prepare($sql);
//  $stmt->execute();
//    $result = $stmt->fetchAll();
foreach ($result as $row) {
   
   $row['client'] = $row['customer_id'];
   $row['sdate'] = date("d-m-Y h:i A", strtotime($row['del_date']));
   $row['edate'] = date("d-m-Y h:i A", strtotime($row['del_date']));
   $row['task'] = $row['customer_no'];
   $row['company'] = $row['customer_id'];
   $row['cust_name'] = $row['customer_id'];
   $sched_res[$row['id']] = $row;



   $i++;
}

// print_r($sched_res);
// exit;
?>

<?php
    $date12 = date('Y'); // Current year
    $stmt4 = $conn->prepare("SELECT count(*) as total12 FROM `leaves` WHERE YEAR(date) = ? AND type='1'");
    $stmt4->execute([$date12]);
    $record4 = $stmt4->fetch();
    
   
    $paid = $record4['total12'] ;
    
  
    $stmt = $conn->prepare("SELECT count(*) as total FROM `leaves` WHERE YEAR(date) = ? AND type='2'");
    $stmt->execute([$date12]);
    $record = $stmt->fetch();
 

    $unpaid = $record['total']; // Handle null budget value
?>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Mostly take for this year'],
      ['Paid', <?php echo $paid; ?>],
      ['UnPaid', <?php echo $unpaid; ?>]
    ]);

    var options = {
      title: 'Leave Type Distribution',
      chartArea: {width: '50%'},
      hAxis: {
        title: 'No of Employee',
        minValue: 0
      },
      vAxis: {
        title: 'Leave Type'
      }
    };

    var chart = new google.visualization.BarChart(document.getElementById('bar'));

    chart.draw(data, options);
  }
</script>







<script>
   var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script>
   var calendar;
   var Calendar = FullCalendar.Calendar;

   var events = [];
   $(function() {
      if (!!scheds) {
         Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({
               id: row.id,
               client: row.customer_id,
               company: row.customer_id,
               task: row.customer_no,
               start: row.del_date
            });
         })
      }
      var date = new Date()
      var d = date.getDate(),
         m = date.getMonth(),
         y = date.getFullYear()

      calendar = new Calendar(document.getElementById('calendardata'), {
         headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
         },

         selectable: true,
         themeSystem: 'bootstrap',
         //Random default events
         events: events,
         eventClick: function(info) {
            var _details = $('#event-details-modal')
            var id = info.event.id
            if (!!scheds[id]) {
               _details.find('#title').text(scheds[id].client)
               _details.find('#client').text(scheds[id].client)
               _details.find('#task').text(scheds[id].task)
               _details.find('#start').text(scheds[id].sdate)
               _details.find('#end').text(scheds[id].edate)
               _details.find('#company').text(scheds[id].company)
               _details.find('#cust_name').text(scheds[id].cust_name)

               _details.modal('show')
            } else {
               alert("Event is undefined");
            }
         },
         eventDidMount: function(info) {
            // Do Something after events mounted
         },
         editable: true
      });
      calendar.setOption('height', 400);
      calendar.render();

      // Form reset listener
      $('#schedule-form').on('reset', function() {
         $(this).find('input:hidden').val('')
         $(this).find('input:visible').first().focus()
      })

 
   })
</script>

    
 </body>

 </html>
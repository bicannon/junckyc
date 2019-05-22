
<?php
require_once('config/config.php');
$hall_id = getShowHall($_SESSION['SHOW']);
$seatsData = !empty(getSeats($hall_id))?getSeats($hall_id):[];
$maxrow = $seatsData[0]['MaxRow'];
$total_seats = count($seatsData);
// print '<pre>';
// print_r($_SESSION);
// print '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=SYSTEM_NAME?> | Select seats</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">
<style>
.pb-5, .py-5 {
    padding-bottom: 1rem!important;
}

.pt-5, .py-5 {
    padding-top: 1rem!important;
}
.mb-5, .my-5 {
    margin-bottom: 1rem!important;
}
.tbl td {
    padding: 0.05rem;
    vertical-align: top;
    border: 4px solid #fff;
    background: blue;
    border-radius:25px;
    text-align: center;
    color: #fff;
    }
.lbl{
    padding: 0.05rem!important;
    vertical-align: top!important;
    border: 4px solid #fff!important;
    background: #fff!important;
    border-radius:0px!important;
    text-align: center!important;
    color: blue!important;
}
</style>
</head>

<body>

  
  <?php
  require_once('config/nav.php');
  ?> 
  <!-- Header -->
  <!-- Page Content -->
  <div class="container">
  <!-- title -->
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2>Select Tickets</h2>
        <hr>
        </div>
    </div>
<!-- tickets info  -->
    <div class="row" style="min-height:500px;">
      <div class="col-md-12 mb-5">
      <?php
        if(!empty($seatsData)){
            $table = '<table class="tbl"><tr>';
            $loop = 1;
            $label = 'A';
            foreach($seatsData  as $sdata ):
                $table .= '
                <td width="35px">'.$sdata['Row'].'</td>';
                if($loop%$maxrow == 0){
                    $table .= '<td class="lbl" width="35px">'.$sdata['Label'].'</td></tr><tr>';
                }
                $loop++;
            endforeach;
            $table .= '</tr></table>';
            print $table;
        }else{
          print 'No seats found or invalid hall id';
        }
        ?>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
<?php
require_once('config/footer.php');
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

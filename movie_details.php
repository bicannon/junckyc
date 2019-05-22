
<?php
require_once('config/config.php');
$movie_data = getMovies($_REQUEST['id']);
$_SESSION['MOVIE'] = $_REQUEST['id'];
//print_r($movie_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=SYSTEM_NAME . ' | '.$movie_data['Title']?></title>

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
            <h2><?=$movie_data['Title']?></h2>
        <hr>
        </div>
    </div>
<!-- movie info  -->
    <div class="row">
      <div class="col-md-6 mb-5">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$movie_data['Trailer']?>?rel=0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-6 mb-5">
        <address>
            <h2>Movie Meta Information</h2>
            <br>Written By : <br><b><?=$movie_data['Writers']?></b>
            <br>Directed By : <br><b><?=$movie_data['Directors']?></b>
            <br>Rating : <br><b><?=$movie_data['Ratings']?></b>
            <abbr title="Phone">Released:</abbr><br>
            <b><?=date('M jS, Y', strtotime($movie_data['ReleaseDate']))?></b><br>
            <abbr title="Phone">Cast:</abbr><br>
            <b><?=$movie_data['Cast']?></b>
            <br>
        </address>
      </div>

    </div>
    <!-- /.row -->
    <!-- plot -->
    <div class="row">
        <div class="col-md-12 mb-5">
        <h2>Plot</h2>
            <p><?=$movie_data['Plot']?></p>
        <hr>
        </div>
    </div>
    <!-- show times -->
    <div class="row">
        <div class="col-md-12 mb-5">
        <h2>Showtimes</h2><br>
        <?php 
        $show_dates = explode(',', getShowDates($_REQUEST['id'])['dates']);
        //print_r($show_dates);
        foreach( $show_dates as $sd ):
            print '<p><b>'.date('M jS, Y', strtotime($sd)).'</b></p><p><div class="btn-group">';
            $times = getShowtimes($_REQUEST['id'], $sd);
            foreach( $times as $t ):
        ?>
           <a href="tickets.php?show=<?=$t['ShowtimeId']?>" style="margin-right: 6px;" class="btn btn-warning">Buy tickets for <?=date('h:i a', strtotime($t['Time']))?></a>
            <?php 
            endforeach;
            ?>
        </div></p><hr>
        <?php 
            endforeach;
        ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
        <h2>Related Movies</h2>
        </div>
    <?php 
    $movies_data = getMovies();
    foreach( $movies_data as $md ):
        if($md['MovieId'] == $_REQUEST['id']){

        }else{
    ?>
      <div class="col-md-2 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="images/movies/<?=$md['Banner']?>" alt="">
          <div class="card-body">
            
            <p class="card-text"><?=ucwords($md['Title'])?></p>
          </div>
          <div class="card-footer">
            <a href="movie_details.php?id=<?=$md['MovieId']?>" class="btn btn-primary">Showtimes</a>
          </div>
        </div>
      </div>
      <?php 
        }
      endforeach ; 
      ?>
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

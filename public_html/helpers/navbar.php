<?php
  $links = array(
      "History" => "/history.php",
      "Menu" => "/menu.php",
      "Catering" => "/catering.php",
      "Party Reservations" => "/party-reservations.php",
      "FAQ" => "/faq.php",
      "Employment" => "/employment.php",
      "Contact" => "/contact.php"
  );

  $currPage = $_SERVER["PHP_SELF"];
?>

<nav class="navbar navbar-inverse navbar-fixed-top" id="main-nav-bar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" id="navbarBrandImage"/>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <?php foreach ($links as $name => $page) : ?>
          <li
          <?php if ($page === $currPage) : ?>
            class="active"
          <?php endif ?>
          ><a href="<?= $page ?>"><?= $name ?></a>
          </li>
        <?php endforeach ?>
        <!--
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>-->
      </ul>
      <?php if(isset($_SESSION["logged_in"])) : ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="specials.php">Specials</a></li>
              <li><a href="#" id="log-out-btn">Log Out</a></li>
              <script>
                $("#log-out-btn").click(function(){logOut();});

                function logOut()
                {
                  $.ajax({
                    url: "<?=HOST_URL?>helpers/logOut.php",
                  }).done(function(){
                    console.log("worked");
                    window.location.replace("<?=HOST_URL?>");
                  });
                }
              </script>
            </ul>
          </li>
        </ul>
      <?php endif ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




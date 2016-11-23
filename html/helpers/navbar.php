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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!DOCTYPE html>
<html>
<head>
  <title>Slick Playground</title>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
  </style>
</head>
<body>

  <section class="regular slider">
    <div>
      <img src="http://placehold.it/350x300?text=1">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=6">
    </div>
  </section>

  <section class="center slider">
    <div>
      <img src="http://placehold.it/350x300?text=1">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=6">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=7">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=8">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=9">
    </div>
  </section>

  <section class="variable slider">
    <div>
      <img src="http://placehold.it/350x300?text=1">
    </div>
    <div>
      <img src="http://placehold.it/200x300?text=2">
    </div>
    <div>
      <img src="http://placehold.it/100x300?text=3">
    </div>
    <div>
      <img src="http://placehold.it/200x300?text=4">
    </div>
    <div>
      <img src="http://placehold.it/350x300?text=5">
    </div>
    <div>
      <img src="http://placehold.it/300x300?text=6">
    </div>
  </section>

  
  <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
    });
  </script>

</body>
</html>
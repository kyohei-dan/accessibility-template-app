<!DOCTYPE html>
<html lang="ja">

<?php $_SERVER["REQUEST_URI"] == "/" ? $og_type = "website" : $og_type =  "article"; ?>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo $og_type; ?>: http://ogp.me/ns/<?php echo $og_type; ?>#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <?php wp_head(); ?>
</head>

<body class="front-page">
  <div id="top">
    <?php part("header"); ?>

    <main>
      <p>test</p>
    </main>

    <?php part("footer"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>
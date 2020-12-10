<?php
include("./api/functions.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Blog do Pedro</title>
</head>

<body>
  <header>
    <h1>Blog do Pedro</h1>
  </header>
  <main>
    <?php
    $articles = listArticles();
    while ($article = $articles->fetch_array()) {
      echo "
          <div class='article'>
            <a href='./article/?code=" . $article['cd_article'] . "'>
              <h2>" . $article['nm_title'] . "</h2>
              <h4>" . $article['ds_subtitle'] . "</h4>
              <p>" . $article['ds_content'] . "</p>
            </a>
          </div>";
    }

    ?>
  </main>
</body>

</html>
<?php
include("../api/functions.php");


if (isset($_GET['code'])) {
  $codeArticle = $_GET['code'];
  $article = showArticle($codeArticle);
  while ($Article = $article->fetch_array())
    echo '
      <!DOCTYPE html>
      <html lang="pt-br">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>' . $Article['nm_title'] . ' | Blog do Pedro</title>
      </head>
      <body>
        <header>
          <a href="../index.php">
            <h1>Blog do Pedro</h1>
          </a>
        </header> 
        <main>
          <div class="articleContent">
            <h1>' . $Article['nm_title'] . '</h1>
            <h2>' . $Article['ds_subtitle'] . '</h2>
            <div>' . $Article['ds_content'] . '</div>
          </div>
        </main>
      </body>
      </html>
    ';
} else {
  header('Location: ../index.php');
}

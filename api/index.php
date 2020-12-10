<?php
include("functions.php");
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
if ($REQUEST_METHOD == 'GET') {
  if (empty($_GET)) {
    $articles = array();
    $result = listArticles();
    if ($result) {
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $articles[] = $row;
      }
    }
    echo json_encode($articles);
  }

  if (isset($_GET['article'])) {
    $code = $_GET['article'];
    $article = array();
    $result = showArticle($code);
    if ($result) {
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $article[] = $row;
      }
    }
    echo json_encode($article);
  }
}

if ($REQUEST_METHOD == 'POST') {
  // Pega dados brutos da solicitação
  $json = file_get_contents('php://input');
  // Converte em um objeto PHP
  $data = json_decode($json);

  if (isset($data->new)) {
    $res = createArticle($data->title, $data->subtitle, $data->content);
    if ($res)
      echo '{"success": "artigo criado com sucesso"}';
    else
      echo '{"error": "erro ao criar artigo"}';
  }

  if (isset($data->update)) {
    $res = updateArticle($data->code, $data->title, $data->subtitle, $data->content);
    if ($res)
      echo '{"success": "artigo atualizado com sucesso"}';
    else
      echo '{"error": "erro ao atualizar artigo"}';
  }

  if (isset($data->delete)) {
    $res = deleteArticle($data->code);
    if ($res)
      echo '{"success": "artigo removido com sucesso"}';
    else
      echo '{"error": "erro ao remover artigo"}';
  }
}

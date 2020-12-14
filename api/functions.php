<?php
include "../../../inc/dbinfo.inc";

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno($connection))
  echo "Problemas com a conexão";


// articles
function createArticle($title, $subtitle, $content)
{
  $sql = "INSERT INTO tb_article VALUES (null, '$title', '$subtitle', '$content')";
  $res = mysqli_query($GLOBALS['connection'], $sql);

  return $res;
}
function listArticles()
{
  $sql = "SELECT * FROM tb_article";
  $res = $GLOBALS['connection']->query($sql);

  return $res;
}
function showArticle($codeArticle)
{
  $sql = "SELECT * FROM tb_article WHERE cd_article = $codeArticle";
  $res = $GLOBALS['connection']->query($sql);

  return $res;
}
function deleteArticle($codeArticle)
{
  $sql = "DELETE FROM tb_article WHERE cd_article = $codeArticle";
  $res = $GLOBALS['connection']->query($sql);
  if ($res)
    return true;
  else
    return false;
}
function updateArticle($codeArticle, $title, $subtitle, $content)
{
  $sql = "UPDATE tb_article SET nm_title = '$title', ds_subtitle = '$subtitle', ds_content = '$content' WHERE cd_article = $codeArticle";
  $res = $GLOBALS['connection']->query($sql);
  if ($res)
    return true;
  else
    return false;
}

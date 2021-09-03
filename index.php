<?php
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);

  $template = $twig->loadTemplate('main.tmpl');

  $dirS = "gallery_img/small"; 
  $dirB = "gallery_img/big";// Путь к директории, в которой лежат изображения
  
  $files = array_slice(scandir($dirS), 2); // Получаем список файлов из этой директории

  echo $template->render(array (
    'dirS' => $dirS,
    'dirB' => $dirB,
    'files' => $files
  ));
} catch (Exception $e){
  die ('ERROR: ' . $e->getMessage());
}
?>
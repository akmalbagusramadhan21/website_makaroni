<?php

spl_autoload_register(function ($className) {
  $file = __DIR__ . '/../classes/' . strtolower($className) . '.class.php';

  if (file_exists($file)) {
    require_once $file;
  } else {
    die("Autoloader error: class file not found: " . $file);
  }
});

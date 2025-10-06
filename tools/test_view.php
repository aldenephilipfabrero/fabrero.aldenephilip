<?php
$app = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR;
$view_file = 'auth/register';
$normalized = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $view_file);
$view_path = $app . 'views' . DIRECTORY_SEPARATOR . $normalized;
$target = pathinfo($view_file, PATHINFO_EXTENSION) == '' ? $view_path . '.php' : $view_path;
echo 'target: ' . $target . PHP_EOL;
echo (file_exists($target) ? 'exists' : 'missing') . PHP_EOL;
$alternate = $app . 'views' . DIRECTORY_SEPARATOR . $view_file . (pathinfo($view_file, PATHINFO_EXTENSION) == '' ? '.php' : '');
echo 'alternate: ' . $alternate . PHP_EOL;
echo (file_exists($alternate) ? 'exists' : 'missing') . PHP_EOL;

// Also report actual view file path
$actual = realpath($app . 'views' . DIRECTORY_SEPARATOR . 'auth' . DIRECTORY_SEPARATOR . 'register.php');
echo 'actual: ' . ($actual ?: 'not found') . PHP_EOL;
?>
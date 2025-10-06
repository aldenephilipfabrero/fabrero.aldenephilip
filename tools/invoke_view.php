<?php
// Minimal bootstrap to test Invoker->view()
require_once __DIR__ . '\\..\\index.php';
// index.php will define APP_DIR, SYSTEM_DIR and load LavaLust which sets up the environment
// Create a minimal lava_instance with call property if not already available
if (! function_exists('lava_instance')) {
    function lava_instance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new stdClass();
        }
        return $instance;
    }
}

// Ensure Invoker is loadable
if (! class_exists('Invoker')) {
    require_once SYSTEM_DIR . 'kernel/Invoker.php';
}

$invoker = new Invoker();
try {
    // this will echo the view output
    $invoker->view('auth/register');
    echo "\n-- Invoker view() executed without throwing an exception.\n";
} catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage() . PHP_EOL;
}

?>
<?php

namespace Pdate\Tests {
    // Path
    define('DS', addslashes(DIRECTORY_SEPARATOR));
    define('PATH_ROOT', addslashes(dirname(__DIR__) . DS));
    define('PATH_TESTS', PATH_ROOT . 'tests' . DS);
    define('PATH_VENDOR', PATH_ROOT . 'vendor' . DS);

    if (!is_file(PATH_VENDOR . 'autoload.php')) {
        fwrite(STDERR, 'Missing dependencies. Could not find file "' . PATH_VENDOR . 'autoload.php".' . PHP_EOL);
        exit(E_USER_ERROR);
    }

    require(PATH_VENDOR . 'autoload.php'); // Note: Do NOT use `require_once()` for autoload files.
    require_once(PATH_TESTS . 'compatibility.php');
    require_once(PATH_ROOT . 'pdate.php');

    // Error
    ini_set('error_reporting', 'E_ALL');
    ini_set('display_startup_errors', 'On');
    ini_set('ignore_repeated_errors', 'On');
    ini_set('display_errors', 'On'); // PHP's error/exception display system.
    ini_set('memory_limit', '128M');
    ini_set('date.timezone', 'UTC');
}

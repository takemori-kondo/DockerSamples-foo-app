<?php
// PHP Version 8.3
declare(strict_types=1);

// basic parameter
echo '<pre>';
echo 'PHP_INI_SCAN_DIR                       :' . getenv('PHP_INI_SCAN_DIR') . "\n";
echo 'Loaded Configuration File              :' . php_ini_loaded_file() . '<br>';
$scanned_files = explode(",\n", php_ini_scanned_files());
$dirs = [];
foreach ($scanned_files as $file) {
    $dir = dirname($file);
    if (!in_array($dir, $dirs)) {
        $dirs[] = $dir;
    }
}
echo 'Scan this dir for additional .ini files:' . implode(", ", $dirs) . '<br>';
echo '$_SERVER[\'SERVER_ADDR\']                :' . $_SERVER['SERVER_ADDR'] . '<br>';
echo '$_SERVER[\'DOCUMENT_ROOT\']              :' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
echo 'error_log                              :' . ini_get('error_log') . '<br>';

error_log("error_log 出力確認");

$newOrLoaded;
session_start();
if (isset($_SESSION['session_id_16']) && !empty($_SESSION['session_id_16'])) {
    $newOrLoaded = 'loaded';
} else {
    $newOrLoaded = 'new';
}
$_SESSION['session_id_16'] = substr(session_id(), 0, 16);
echo 'session new or loaded                  :' . $newOrLoaded . '<br>';
echo 'session id (0-15 chars)                :' . $_SESSION['session_id_16'] . '<br>';

// phalcon5 parameter
echo '<br>';
echo "Phalcon :" . (new Phalcon\Support\Version())->get() . '<br>';

echo '</pre>';
phpinfo();
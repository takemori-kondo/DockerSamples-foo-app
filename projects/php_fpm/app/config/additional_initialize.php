<?php
// PHP8.3
declare(strict_types=1);

/**
 * アプリケーション固有の追加の初期化処理
 * 
 * 他のconfig完了後、new \Phalcon\Mvc\Application前に、実行される
 * 以下の変数にアクセス可能
 * $di
 * $config
 */

LogUtil::initialize($config->get('application')->get('logLevel'));

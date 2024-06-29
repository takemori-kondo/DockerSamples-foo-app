<?php
// PHP8.3
declare(strict_types=1);

use Phalcon\Db\Adapter\AdapterInterface;
use Phalcon\Di\Di;

class PhalconDbUtil
{
    public static function queryBySql(string $sql, array $params, AdapterInterface $db = null): array
    {
        if ($db === null) {
            /** @var AdapterInterface */
            $db = Di::getDefault()->get('db');
        }
        $ri = $db->query($sql, $params);
        $results = $ri->fetchAll();
        return $results;
    }

    public static function executeBySql(string $sql, array $params, AdapterInterface $db = null): int
    {
        if ($db === null) {
            /** @var AdapterInterface */
            $db = Di::getDefault()->get('db');
        }
        $db->execute($sql, $params);
        $count = $db->affectedRows();
        return $count;
    }
}

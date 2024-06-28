<?php
// PHP8.3
declare(strict_types=1);

use Phalcon\Db\Adapter\AdapterInterface;

class PhalconDbUtil
{
    public static function queryBySql(AdapterInterface $db, string $sql, array $params): array
    {
        $ri = $db->query($sql, $params);
        $results = $ri->fetchAll();
        return $results;
    }

    public static function executeBySql(AdapterInterface $db, string $sql, array $params): int
    {
        $db->execute($sql, $params);
        $count = $db->affectedRows();
        return $count;
    }
}

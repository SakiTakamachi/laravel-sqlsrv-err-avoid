<?php

namespace SqlsrvErrAvoid;

use Illuminate\Database\Connectors\SqlServerConnector;
use Illuminate\Database\Connectors\ConnectorInterface;
use PDO;
use PDOException;

class SqlServerErrAvoidConnector extends SqlServerConnector implements ConnectorInterface
{
    /**
     * Create a new PDO connection instance.
     * PDO::ATTR_STRINGIFY_FETCHES option only, wrap in try catch
     *
     * @param  string  $dsn
     * @param  string  $username
     * @param  string  $password
     * @param  array  $options
     * @return PDO
     */
    protected function createPdoConnection($dsn, $username, $password, $options)
    {
        $stringifyFetches = null;
        if (array_key_exists(PDO::ATTR_STRINGIFY_FETCHES, $options)) {
            $stringifyFetches = $options[PDO::ATTR_STRINGIFY_FETCHES];
            unset($options[PDO::ATTR_STRINGIFY_FETCHES]);
        }

        $pdo = new PDO($dsn, $username, $password, $options);

        if (! is_null($stringifyFetches)) {
            try {
                $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, $stringifyFetches);
            } catch (PDOException $e) {
                // do nothing
            }
        }

        return $pdo;
    }
}
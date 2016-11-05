<?php

namespace Database\Connectors;

use Database\Connector;
use Database\ConnectorInterface;

use PDO;


class PostgresConnector extends Connector implements ConnectorInterface
{
    /**
     * The default PDO connection options.
     *
     * @var array
     */
    protected $options = array(
        PDO::ATTR_CASE              => PDO::CASE_NATURAL,
        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ORACLE_NULLS      => PDO::NULL_NATURAL,
        PDO::ATTR_STRINGIFY_FETCHES => false,
    );


    /**
     * Establish a database connection.
     *
     * @param  array  $config
     * @return PDO
     */
    public function connect(array $config)
    {
        $dsn = $this->getDsn($config);

        $options = $this->getOptions($config);

        $connection = $this->createConnection($dsn, $config, $options);

        //
        $charset = $config['charset'];

        $connection->prepare("set names '$charset'")->execute();

        if (isset($config['schema'])) {
            $schema = $config['schema'];

            $connection->prepare("set search_path to {$schema}")->execute();
        }

        return $connection;
    }

    /**
     * Create a DSN string from a configuration.
     *
     * @param  array   $config
     * @return string
     */
    protected function getDsn(array $config)
    {
        extract($config);

        //
        $host = isset($host) ? "host={$host};" : '';

        $dsn = "pgsql:{$hostname}dbname={$database}";

        if (isset($config['port'])) {
            $dsn .= ";port={$port}";
        }

        return $dsn;
    }

}

<?php

namespace Database\Query\Processors;

use Database\Query\Builder;
use Database\Query\Processor;


class PostgresProcessor extends Processor
{
    /**
     * Process an "insert get ID" query.
     *
     * @param  \Database\Query\Builder  $query
     * @param  string  $sql
     * @param  array   $values
     * @param  string  $sequence
     * @return int
     */
    public function processInsertGetId(Builder $query, $sql, $values, $sequence = null)
    {
        $results = $query->getConnection()->selectFromWriteConnection($sql, $values);

        $sequence = $sequence ?: 'id';

        $result = (array) $results[0];

        $id = $result[$sequence];

        return is_numeric($id) ? (int) $id : $id;
    }

}

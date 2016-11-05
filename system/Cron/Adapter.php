<?php

namespace Cron;


abstract class Adapter
{
    protected $name = 'CRON Adapter';

    /**
     * Create a new Adapter instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the the assigned tasks.
     *
     * @return array
     */
    public function execute()
    {
        $result = $this->handle();

        return array($this->name, $result);
    }

    /**
     * Handle the assigned tasks.
     */
    abstract public function handle();

    /**
     * Return the Adapter name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

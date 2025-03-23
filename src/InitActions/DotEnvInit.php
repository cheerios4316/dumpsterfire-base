<?php

namespace DumpsterfireBase\InitActions;

use Dotenv\Dotenv;
use DumpsterfireBase\Interfaces\InitActionInterface;

class DotEnvInit implements InitActionInterface
{
    public function run(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
}
<?php

namespace Src\Interfaces;

use DumpsterfireBase\Interfaces\LoggerInterface;

interface ILoggable {
    public function setLogger(LoggerInterface $loggerInterface): self;
}
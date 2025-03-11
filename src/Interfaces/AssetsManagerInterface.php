<?php

namespace DumpsterfireBase\Interfaces;

interface AssetsManagerInterface
{
    public function loadJs(string $path): self;
    public function loadCss(string $path): self;
}
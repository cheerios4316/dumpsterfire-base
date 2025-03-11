<?php

namespace DumpsterfireBase\AssetsManager;

use DumpsterfireBase\Interfaces\AssetsManagerInterface;

class AssetsManager implements AssetsManagerInterface
{
    public function loadJs(string $path): self
    {
        return $this;
    }

    public function loadCss(string $path): self
    {
        return $this;
    }
}
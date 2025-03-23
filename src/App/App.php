<?php

namespace DumpsterfireBase\App;

use DumpsterfireBase\Container\Container;
use DumpsterfireBase\InitActions\DotEnvInit;
use DumpsterfireBase\InitActions\WhoopsInit;
use DumpsterfireComponents\Component;
use DumpsterfireComponents\PageTemplate\PageTemplate;
use DumpsterfireRouter\Interfaces\RouterInterface;

class App
{
    protected array $initActions = [];

    protected array $defaultInitActions = [
        DotEnvInit::class,
        WhoopsInit::class,
    ];

    protected ?RouterInterface $router = null;

    public function setRouter(RouterInterface $routerInterface): self
    {
        $this->router = $routerInterface;
        return $this;
    }

    public function run(): self
    {
        $request = $_SERVER;

        $requestUri = $request['REQUEST_URI'];

        if($this->router) {
            $controller = $this->router->getControllerFromRoute($requestUri);
            $controller->getPage()->render();
        }

        return $this;
    }

    /**
     * @param class-string<Component> $component
     * @return App
     */
    public function setPageTemplateHeader(string $component): self
    {
        PageTemplate::setHeader($component);
        return $this;
    }

    /**
     * @param class-string<Component> $component
     * @return App
     */
    public function setPageTemplateFooter(string $component): self
    {
        PageTemplate::setFooter($component);
        return $this;
    }

    public function getInitActions(): array
    {
        return $this->initActions;
    }

    public function setInitActions(array $initActions): self
    {
        $this->initActions = $initActions;
        return $this;
    }

    public function getDefaultInitActions(): array
    {
        return $this->defaultInitActions;
    }

    public static function new(): self
    {
        return Container::getInstance()->create(self::class);
    }
}
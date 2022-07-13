<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class Symfony_DI_PhpDumper_Service_Wither_Lazy extends Container
{
    protected $parameters = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'wither' => 'getWitherService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'Symfony\\Component\\DependencyInjection\\Tests\\Compiler\\Foo' => true,
        ];
    }

    protected function createProxy($class, \Closure $factory)
    {
        return $factory();
    }

    protected function hydrateProxy($proxy, $instance)
    {
        if ($proxy === $instance) {
            return $proxy;
        }

        if (!\in_array(\get_class($instance), [\get_class($proxy), get_parent_class($proxy)], true)) {
            throw new LogicException(sprintf('Lazy service of type "%s" cannot be hydrated because its factory returned an unexpected instance of "%s". Try adding the "proxy" tag to the corresponding service definition with attribute "interface" set to "%1$s".', get_parent_class($proxy), get_debug_type($instance)));
        }

        return \Symfony\Component\VarExporter\Hydrator::hydrate($proxy, (array) $instance);
    }

    /**
     * Gets the public 'wither' shared autowired service.
     *
     * @return \Symfony\Component\DependencyInjection\Tests\Compiler\Wither
     */
    protected function getWitherService($lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $this->services['wither'] = $this->createProxy('Wither_94fa281', function () {
                return \Wither_94fa281::createLazyGhostObject($this->getWitherService(...));
            });
        }

        $instance = $lazyLoad;

        $a = new \Symfony\Component\DependencyInjection\Tests\Compiler\Foo();

        $instance = $instance->withFoo1($a);
        $instance = $instance->withFoo2($a);
        $instance->setFoo($a);

        return $this->hydrateProxy($lazyLoad, $instance);
    }
}

class Wither_94fa281 extends \Symfony\Component\DependencyInjection\Tests\Compiler\Wither implements \Symfony\Component\VarExporter\LazyGhostObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostObjectTrait;
}

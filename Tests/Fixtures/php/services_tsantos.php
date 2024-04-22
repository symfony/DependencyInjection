<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    protected $parameters = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'tsantos_serializer' => 'getTsantosSerializerService',
        ];
        $this->aliases = [
            'TSantos\\Serializer\\SerializerInterface' => 'tsantos_serializer',
        ];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    /**
     * Gets the public 'tsantos_serializer' shared service.
     *
     * @return \TSantos\Serializer\EventEmitterSerializer
     */
    protected static function getTsantosSerializerService($container)
    {
        $a = new \TSantos\Serializer\NormalizerRegistry();

        $b = new \TSantos\Serializer\Normalizer\CollectionNormalizer();

        $c = new \TSantos\Serializer\EventDispatcher\EventDispatcher();
        $c->addSubscriber(new \TSantos\SerializerBundle\EventListener\StopwatchListener(new \Symfony\Component\Stopwatch\Stopwatch(true)));

        $container->services['tsantos_serializer'] = $instance = new \TSantos\Serializer\EventEmitterSerializer(new \TSantos\Serializer\Encoder\JsonEncoder(), $a, $c);

        $b->setSerializer($instance);
        $d = new \TSantos\Serializer\Normalizer\JsonNormalizer();
        $d->setSerializer($instance);

        $a->add(new \TSantos\Serializer\Normalizer\ObjectNormalizer(new \TSantos\SerializerBundle\Serializer\CircularReferenceHandler()));
        $a->add($b);
        $a->add($d);

        return $instance;
    }
}

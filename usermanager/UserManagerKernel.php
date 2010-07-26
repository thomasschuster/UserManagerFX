<?php

require_once __DIR__ . '/../src/autoload.php';

use Symfony\Framework\Kernel;
use Symfony\Components\DependencyInjection\Loader\LoaderInterface;
use Symfony\Components\DependencyInjection\ContainerBuilder;

use Symfony\Framework\KernelBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\ZendBundle\ZendBundle;

use Application\UserManagerBundle\UserManagerBundle;

class UserManagerKernel extends Kernel
{
    public function registerRootDir()
    {
        return __DIR__;
    }

    public function registerBundles()
    {
        return array(
            new KernelBundle(),
            new FrameworkBundle(),
            new DoctrineBundle(),
            new ZendBundle(),
            new UserManagerBundle()
        );
    }

    public function registerBundleDirs()
    {
        return array(
            'Application'     => __DIR__ . '/../src/Application',
            'Bundle'          => __DIR__ . '/../src/Bundle',
            'Symfony\\Bundle' => __DIR__ . '/src/vendor/symfony/src/Symfony/Bundle'
        );
    }

    public function registerRoutes()
    {
        $loader = new RoutingLoader($this->getBundleDirs());
        
        return $loader->load(__DIR__ . '/config/routing.yml');
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        return $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
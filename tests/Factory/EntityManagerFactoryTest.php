<?php
namespace AcelayaTest\UrlShortener\Factory;

use Acelaya\UrlShortener\Factory\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\ServiceManager\ServiceManager;

class EntityManagerFactoryTest extends TestCase
{
    /**
     * @var EntityManagerFactory
     */
    protected $factory;

    public function setUp()
    {
        $this->factory = new EntityManagerFactory();
    }

    /**
     * @test
     */
    public function serviceIsCreated()
    {
        $sm = new ServiceManager(['services' => [
            'config' => [
                'debug' => true,
                'database' => [
                    'driver' => 'pdo_sqlite',
                ],
            ],
        ]]);

        $em = $this->factory->__invoke($sm, EntityManager::class);
        $this->assertInstanceOf(EntityManager::class, $em);
    }
}
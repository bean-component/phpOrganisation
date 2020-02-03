<?php

namespace Bean\Tests\Organisation\Doctrine\Orm;

use Bean\Organisation\Doctrine\Orm\Entity\Organisation;
use Bean\Thing\Model\Thing;
use Doctrine\ORM\Tools\SchemaTool;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OrganisationTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function clearDatabase()
    {
        $em = $this->entityManager;
        if (!isset($metadatas)) {
            $metadatas = $em->getMetadataFactory()->getAllMetadata();
        }
        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        if (!empty($metadatas)) {
            $schemaTool->createSchema($metadatas);
        }
    }

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->clearDatabase();

        $loc = new Organisation();
        $loc->setSlug('magenta-location');

        $loc->setName('Trivex Building, Singapore');
        $loc->setState(Thing::STATE_PUBLISHED);
        $now = $loc->getCreatedAt();
        $now->setTimezone(new \DateTimeZone('Asia/Singapore'));
        $loc->setDescription($now->format('Y-m-d H:i:s'));

        $this->entityManager->persist($loc);
        $this->entityManager->flush();
    }

    public function testSearchBySlug()
    {
        /** @var Organisation $loc */
        $loc = $this->entityManager->getRepository(Organisation::class)->findOneBySlug('magenta-location');
        $this->assertNotEmpty($loc);
        $this->assertIsArray($data = $loc->getData());
    }
}
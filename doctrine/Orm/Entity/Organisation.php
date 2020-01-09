<?php

namespace Bean\Organisation\Doctrine\Orm\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Organisation extends \Bean\Organisation\Model\Organisation
{
    function __construct()
    {
        parent::__construct();
        $this->subOrganisations = new ArrayCollection();
    }

    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $id;

    /**
     *  Mapping for Thing properties
     */
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    protected $subdomain;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="Organisation", inversedBy="subOrganisations")
     */
    protected $parentOrganisation;

    /**
     * @ORM\OneToMany(targetEntity="Organisation", mappedBy="parentOrganisation")
     */
    protected $subOrganisations;


    public function getId(): ?int
    {
        return $this->id;
    }
}

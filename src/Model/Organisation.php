<?php

namespace Bean\Organisation\Model;

use Bean\Thing\Model\Thing;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Organisation extends Thing implements OrganisationInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->individualMembers = new ArrayCollection();
        $this->subOrganisations = new ArrayCollection();
    }

    /**
     * NOT part of schema.org
     * @var Collection
     */
    protected $individualMembers;

    /**
     * NOT part of schema.org
     * A Subdomain
     * @var string|null
     */
    protected $subdomain;

    /**
     * The larger organization that this organization is a subOrganization of, if any. Supersedes branchOf.
     *    Inverse property: subOrganization.
     * @var OrganisationInterface|null
     */
    protected $parentOrganisation;

    /**
     * A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific 'department' property.
     *    Inverse property: parentOrganization.
     * @var Collection
     */
    protected $subOrganisations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubdomain(): ?string
    {
        return $this->subdomain;
    }

    public function setSubdomain(?string $subdomain): OrganisationInterface
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    public function getParentOrganisation(): ?OrganisationInterface
    {
        return $this->parentOrganisation;
    }

    public function setParentOrganisation(?OrganisationInterface $parentOrganisation): OrganisationInterface
    {
        $this->parentOrganisation = $parentOrganisation;

        return $this;
    }

    /**
     * @return Collection|OrganisationInterface[]
     */
    public function getSubOrganisations(): Collection
    {
        return $this->subOrganisations;
    }

    public function addSubOrganisation(OrganisationInterface $subOrganisation): OrganisationInterface
    {
        if (!$this->subOrganisations->contains($subOrganisation)) {
            $this->subOrganisations[] = $subOrganisation;
            $subOrganisation->setParentOrganisation($this);
        }

        return $this;
    }

    public function removeSubOrganisation(OrganisationInterface $subOrganisation): OrganisationInterface
    {
        if ($this->subOrganisations->contains($subOrganisation)) {
            $this->subOrganisations->removeElement($subOrganisation);
            // set the owning side to null (unless already changed)
            if ($subOrganisation->getParentOrganisation() === $this) {
                $subOrganisation->setParentOrganisation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|IndividualMemberInterface[]
     */
    public function getIndividualMembers(): Collection
    {
        return $this->individualMembers;
    }

    public function addIndividualMember(IndividualMemberInterface $individualMember): OrganisationInterface
    {
        if (!$this->individualMembers->contains($individualMember)) {
            $this->individualMembers[] = $individualMember;
            $individualMember->setOrganisation($this);
        }

        return $this;
    }

    public function removeIndividualMember(IndividualMemberInterface $individualMember): OrganisationInterface
    {
        if ($this->individualMembers->contains($individualMember)) {
            $this->individualMembers->removeElement($individualMember);
            // set the owning side to null (unless already changed)
            if ($individualMember->getOrganisation() === $this) {
                $individualMember->setOrganisation(null);
            }
        }

        return $this;
    }
}

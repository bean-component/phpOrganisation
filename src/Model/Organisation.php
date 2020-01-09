<?php

namespace Bean\Organisation\Model;

use Bean\Thing\Model\Thing;

class Organisation extends Thing
{

    /**
     * NOT part of schema.org
     * A Subdomain
     * @var string|null
     */
    protected $subdomain;

    /**
     * The larger organization that this organization is a subOrganization of, if any. Supersedes branchOf.
     *    Inverse property: subOrganization.
     * @var Organisation|null
     */
    protected $parentOrganisation;

    /**
     * A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific 'department' property.
     *    Inverse property: parentOrganization.
     * @var array|null
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

    public function setSubdomain(?string $subdomain): self
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    public function getParentOrganisation(): ?self
    {
        return $this->parentOrganisation;
    }

    public function setParentOrganisation(?self $parentOrganisation): self
    {
        $this->parentOrganisation = $parentOrganisation;

        return $this;
    }

    /**
     * @return self[]
     */
    public function getSubOrganisations()
    {
        return $this->subOrganisations;
    }

    public function addSubOrganisation(self $subOrganisation): self
    {
        if (!$this->subOrganisations->contains($subOrganisation)) {
            $this->subOrganisations[] = $subOrganisation;
            $subOrganisation->setParentOrganisation($this);
        }

        return $this;
    }

    public function removeSubOrganisation(self $subOrganisation): self
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
}

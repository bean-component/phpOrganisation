<?php

namespace Bean\Organisation\Model;

use Doctrine\Common\Collections\Collection;

interface OrganisationInterface
{
    public function getSubdomain(): ?string;

    public function setSubdomain(?string $subdomain): OrganisationInterface;

    public function getParentOrganisation(): ?OrganisationInterface;

    public function setParentOrganisation(?OrganisationInterface $parentOrganisation): OrganisationInterface;

    /**
     * @return Collection|OrganisationInterface[]
     */
    public function getSubOrganisations(): Collection;

    public function addSubOrganisation(OrganisationInterface $subOrganisation): OrganisationInterface;

    public function removeSubOrganisation(OrganisationInterface $subOrganisation): OrganisationInterface;

    /**
     * @return Collection|IndividualMemberInterface[]
     */
    public function getIndividualMembers(): Collection;

    public function addIndividualMember(IndividualMemberInterface $individualMember): OrganisationInterface;

    public function removeIndividualMember(IndividualMemberInterface $individualMember): OrganisationInterface;
}
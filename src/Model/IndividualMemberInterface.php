<?php

namespace Bean\Organisation\Model;

use Bean\Thing\Model\ThingInterface;

interface IndividualMemberInterface extends ThingInterface
{
    /**
     * @return OrganisationInterface|null
     */
    public function getOrganisation(): ?OrganisationInterface;

    /**
     * @param OrganisationInterface|null $organisation
     * @return IndividualMemberInterface
     */
    public function setOrganisation(?OrganisationInterface $organisation): IndividualMemberInterface;

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @param array $roles
     * @return IndividualMemberInterface
     */
    public function setRoles(array $roles): IndividualMemberInterface;
}
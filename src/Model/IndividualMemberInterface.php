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
     */
    public function setOrganisation(?OrganisationInterface $organisation): void;

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void;
}
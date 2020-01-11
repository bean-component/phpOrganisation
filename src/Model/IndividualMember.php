<?php

namespace Bean\Organisation\Model;


use Bean\Thing\Model\Thing;

class IndividualMember extends Thing implements IndividualMemberInterface
{
    /**
     * @var Organisation|null
     */
    protected $organisation;

    /**
     * @var array
     */
    protected $roles = [];

    /**
     * @return Organisation|null
     */
    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    /**
     * @param Organisation|null $organisation
     */
    public function setOrganisation(?Organisation $organisation): void
    {
        $this->organisation = $organisation;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

}
<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\UserBundle\Entity\User;

class FullNameProvider
{
    public function getFullUserName(User $user, string $format): string
    {
        return strtr(
            $format,
            [
                'PREFIX' => $user->getNamePrefix(),
                'FIRST' => $user->getFirstName(),
                'MIDDLE' => $user->getMiddleName(),
                'LAST' => $user->getLastName(),
                'SUFFIX' => $user->getNameSuffix(),
            ]
        );
    }

    public function getFullUserNameExample(string $format): string
    {
        $user = new User();
        $user->setNamePrefix('Mr.')
            ->setFirstName('Homer')
            ->setMiddleName('Jay')
            ->setLastName('Simpson')
            ->setNameSuffix('Jr.');

        return $this->getFullUserName($user, $format);
    }
}

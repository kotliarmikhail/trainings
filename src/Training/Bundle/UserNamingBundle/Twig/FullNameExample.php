<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Training\Bundle\UserNamingBundle\Provider\FullNameProvider;
use Twig\Extension\RuntimeExtensionInterface;
use Oro\Bundle\UserBundle\Entity\User;

class FullNameExample implements RuntimeExtensionInterface
{
    public function __construct(private readonly FullNameProvider $fullNameProvider)
    {
    }

    public function getFullNameExample(string $format): string
    {
        return $this->fullNameProvider->getFullUserNameExample($format);
    }
}

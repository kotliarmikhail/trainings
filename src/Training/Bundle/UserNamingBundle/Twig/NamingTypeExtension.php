<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class NamingTypeExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('name_example_filter',
                [FullNameExample::class, 'getFullNameExample']),
        ];
    }
}

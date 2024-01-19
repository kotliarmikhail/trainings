<?php

namespace Training\Bundle\UserNamingBundle\Api\Processor\GetList;

use Oro\Bundle\ApiBundle\Processor\Get\GetContext;
use Oro\Bundle\ApiBundle\Processor\GetList\GetListContext;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;
use Training\Bundle\UserNamingBundle\Provider\FullNameProvider;

class NamingExampleGetListProcessor  implements ProcessorInterface
{
    public function __construct(private FullNameProvider $fullNameProvider)
    {
    }

    public function process(ContextInterface $context): void
    {
        /** @var GetContext|GetListContext $context */

        $result = $context->getResult();

        if (is_array($result)) {
            foreach ($result as $key => $entityData) {
                if (array_key_exists('format', $entityData) &&
                    !array_key_exists('namingExample', $entityData)
                ) {
                    $result[$key]['namingExample'] = $this->fullNameProvider->getFullUserNameExample($entityData['format']);
                }
            }
        }

        $context->setResult($result);
    }
}

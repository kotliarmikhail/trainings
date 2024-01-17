<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class UserNamingTypeController extends AbstractController
{
    /**
     * @Route("/", name="user_naming_type_index")
     * @Template
     * @AclAncestor("user_naming_type_view")
     */
    public function indexAction(): array
    {
        return [
            'entity_class' => UserNamingType::class
        ];
    }

    /**
     * @Route("/view/{id}", name="user_naming_type_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("user_naming_type_view")
     */
    public function viewAction(UserNamingType $type): array
    {
        return [
            'entity_class' => UserNamingType::class,
            'entity' => $type
        ];
    }

    public static function getSubscribedServices(): array
    {
        return parent::getSubscribedServices();
    }
}

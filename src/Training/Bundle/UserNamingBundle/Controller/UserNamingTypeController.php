<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class UserNamingTypeController extends AbstractController
{
    /**
     * @Route("/", name="user_naming_type_index")
     * @Template
     */
    public function indexAction(): array
    {
        return [
            'entity_class' => UserNamingType::class
        ];
    }

    public static function getSubscribedServices(): array
    {
        return parent::getSubscribedServices();
    }
}

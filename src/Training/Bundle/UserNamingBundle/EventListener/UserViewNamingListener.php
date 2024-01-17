<?php

namespace Training\Bundle\UserNamingBundle\EventListener;

use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserViewNamingListener
{
    public function __construct(private readonly AuthorizationCheckerInterface $authChecker)
    {
    }

    public function onUserView(BeforeListRenderEvent $event): void
    {
        if(!$this->authChecker->isGranted('user_naming_info_view')) {
            return;
        }

        $user = $event->getEntity();
        if (!$user) {
            return;
        }

        $event->getScrollData()->addSubBlockData(
            0,
            $event->getScrollData()->addSubBlock(0),
            $event->getEnvironment()->render(
                '@TrainingUserNaming/User/namingData.html.twig',
                ['entity' => $user]
            )
        );
    }
}

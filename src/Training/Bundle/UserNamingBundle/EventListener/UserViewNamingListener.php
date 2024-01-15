<?php

namespace Training\Bundle\UserNamingBundle\EventListener;

use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;

class UserViewNamingListener
{
    public function onUserView(BeforeListRenderEvent $event): void
    {
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

<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="usernaming_user_naming_type")
 * @Config(
 *     defaultValues={
 *         "entity"={
 *             "icon"="fa-address-card",
 *             "label"="User Naming Type",
 *             "plural_label"="User Naming Types",
 *             "description"="Contains how to display user`s name."
 *         }
 *     }
 * )
 */
class UserNamingType implements ExtendEntityInterface
{
    use ExtendEntityTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private string $title;

    /**
     * Allowed placeholders are: PREFIX, FIRST, MIDDLE, LAST, SUFFIX
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private string $format;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }
}

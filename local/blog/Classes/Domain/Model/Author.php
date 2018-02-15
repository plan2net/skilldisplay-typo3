<?php
namespace SkillDisplay\Blog\Domain\Model;

/***
 *
 * This file is part of the "SkillDisplay Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Marianne Moser <mm@plan2.net>, Plan2net GmbH
 *
 ***/

/**
 * Author
 */
class Author extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * active
     *
     * @var bool
     */
    protected $active = false;

    /**
     * birthday
     *
     * @var \DateTime
     */
    protected $birthday = null;

    /**
     * Returns the boolean state of active
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Returns the name
     *
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the active
     *
     * @return bool active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the active
     *
     * @param bool $active
     * @return void
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Returns the birthday
     *
     * @return \DateTime birthday
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Sets the birthday
     *
     * @param \DateTime $birthday
     * @return void
     */
    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
    }
}

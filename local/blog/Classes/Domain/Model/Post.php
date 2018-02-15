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
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * text
     *
     * @var string
     */
    protected $text = '';

    /**
     * author
     *
     * @var \SkillDisplay\Blog\Domain\Model\Author
     */
    protected $author = null;

    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the text
     *
     * @return string text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the author
     *
     * @return \SkillDisplay\Blog\Domain\Model\Author author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param \SkillDisplay\Blog\Domain\Model\Author $author
     * @return void
     */
    public function setAuthor(\SkillDisplay\Blog\Domain\Model\Author $author)
    {
        $this->author = $author;
    }
}

<?php
namespace SkillDisplay\Blog\Controller;

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
 * AuthorController
 */
class AuthorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * authorRepository
     *
     * @var \SkillDisplay\Blog\Domain\Repository\AuthorRepository
     * @inject
     */
    protected $authorRepository = null;

    /**
     * action list
     *
     * @param SkillDisplay\Blog\Domain\Model\Author
     * @return void
     */
    public function listAction()
    {
        $authors = $this->authorRepository->findAll();
        $this->view->assign('authors', $authors);
    }
}

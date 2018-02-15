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
 * PostController
 */
class PostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * postRepository
     *
     * @var \SkillDisplay\Blog\Domain\Repository\PostRepository
     * @inject
     */
    protected $postRepository = null;

    /**
     * action list
     *
     * @param SkillDisplay\Blog\Domain\Model\Post
     * @return void
     */
    public function listAction()
    {
        $posts = $this->postRepository->findAll();
        $this->view->assign('posts', $posts);
    }

    /**
     * action show
     *
     * @param SkillDisplay\Blog\Domain\Model\Post
     * @return void
     */
    public function showAction(\SkillDisplay\Blog\Domain\Model\Post $post)
    {
        $this->view->assign('post', $post);
    }
}

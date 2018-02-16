<?php

namespace SkillDisplay\Blog\Command;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;

class PostCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController {

    /**
     * @var \SkillDisplay\Blog\Domain\Repository\AuthorRepository
     * @inject
     */
    private $authorRepository;

    /**
     * @var \SkillDisplay\Blog\Domain\Repository\PostRepository
     * @inject
     */
    private $postRepository;

    /**
     * @param int $pid Storage PID for post records
     * @param int $authorId ID of author record
     * @param string $title Post title
     * @param string $text Post text
     */
    public function importCommand($pid, $authorId, $title, $text) {
        /** @var \SkillDisplay\Blog\Domain\Model\Author $author */
        $author = $this->authorRepository->findByUid((int)$authorId);
        if ($author) {
            /** @var \SkillDisplay\Blog\Domain\Model\Post $post */
            $post = GeneralUtility::makeInstance(\SkillDisplay\Blog\Domain\Model\Post::class);
            $post->setPid((int)$pid);
            $post->setAuthor($author);
            $post->setTitle($title);
            $post->setText($text);

            try {
                $this->postRepository->add($post);
            }
            catch(IllegalObjectTypeException $e) {
                echo $e->getMessage() . chr(10);
            }
        }
        else {
            echo 'Author not found.' . chr(10);
        }
    }

}


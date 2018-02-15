<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'SkillDisplay.Blog',
            'Posts',
            'Blog-Posts'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('blog', 'Configuration/TypoScript', 'SkillDisplay Blog');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blog_domain_model_post', 'EXT:blog/Resources/Private/Language/locallang_csh_tx_blog_domain_model_post.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blog_domain_model_post');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blog_domain_model_author', 'EXT:blog/Resources/Private/Language/locallang_csh_tx_blog_domain_model_author.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blog_domain_model_author');

    }
);

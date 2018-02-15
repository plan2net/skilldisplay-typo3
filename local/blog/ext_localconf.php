<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SkillDisplay.Blog',
            'Posts',
            [
                'Post' => 'list, show',
                'Author' => 'list'
            ],
            // non-cacheable actions
            [
                'Post' => '',
                'Author' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    posts {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('blog') . 'Resources/Public/Icons/user_plugin_posts.svg
                        title = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_domain_model_posts
                        description = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_domain_model_posts.description
                        tt_content_defValues {
                            CType = list
                            list_type = blog_posts
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);

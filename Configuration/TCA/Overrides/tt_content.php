<?php

defined('TYPO3') or die;

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'news',
    'NewsListAndFilter',
    'LLL:EXT:news_extended/Resources/Private/Language/locallang_be.xlf:plugin.news_list_and_filter.title',
    null,
    'news'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:news_extended/Configuration/FlexForms/flexform_news_list_and_filter.xml',
    'news_newslistandfilter'
);
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['news_newslistandfilter'] = 'ext-news-plugin-news-list-and-filter';
$GLOBALS['TCA']['tt_content']['types']['news_newslistandfilter']['showitem'] = '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin,
            pi_flexform,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ';

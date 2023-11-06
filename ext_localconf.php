<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

/****************************
 ** Extend News Extension **
 ***************************/

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('news')) {
    /**Extend news  model*/
    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['news']['extender'][\GeorgRinger\News\Domain\Model\Dto\NewsDemand::class][1594117552] =
        'EXT:theme/Classes/Domain/Model/Dto/NewsDemand.php';
    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['news']['extender'][\GeorgRinger\News\Domain\Model\News::class][1594117552] =
        'EXT:theme/Classes/Domain/Model/News.php';

    /** News Repository Extend */
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['GeorgRinger\\News\\Domain\\Repository\\NewsRepository'] = [
        'className' => 'Daoued\\NewsExtended\\Domain\\Repository\\NewsRepository'
    ];

    /** News Controller Extend */
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['GeorgRinger\\News\\Controller\\NewsController'] = [
        'className' => 'Daoued\\NewsExtended\\Controller\\NewsController'
    ];
    /** Add new Action for news **/
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->listAndFilter;News->detail'] = 'List and Filter';
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['News']['plugins']['Pi1']['controllers'][\GeorgRinger\News\Controller\NewsController::class]['nonCacheableActions'][] = 'listAndFilter';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'News',
        'NewsListAndFilter',
        [
            \Daoued\NewsExtended\Controller\NewsController::class => 'listAndFilter',
        ],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
            @import \'EXT:news_extended/Configuration/TSconfig/ContentElementWizard.tsconfig\'
    ');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
        trim('
            plugin.tx_news_newslistandfilter {
                 view {
                     templateRootPaths {
                         100 = EXT:news_extended/Resources/Private/Templates/
                     }
                     partialRootPaths {
                         100 = EXT:news_extended/Resources/Private/Partials/
                     }
                 }
             }
         ')
    );
}


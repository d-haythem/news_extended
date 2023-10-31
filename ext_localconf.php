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
}


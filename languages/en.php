<?php
/**
 * ENGLISH (EN) plugin language file
  * 
 * NEEDS a RETURN $pluginLangFile; at the END
 * 
 * 
 * Every plugin language file has to have:
 *    - $pluginLangFile['feinduraPlugin_title']        = 'Exampletitle';
 *    - $pluginLangFile['feinduraPlugin_description']  = 'This is an example plugin dscription.';
 *  
 * If the array key has an "configname_tip" on the end it will be used as toolTip.
 * E.g.:
 * $pluginLangFile['exampleconfig_tip'] = 'Example config tooltip text';
 * 
 * @package [Plugins]
 * @subpackage PaginationPlugin */

/* PLUGIN ************************************************************************************ */

$pluginLangFile['feinduraPlugin_title']        = 'Pagination Plugin';
$pluginLangFile['feinduraPlugin_description']  = 'Show a list of pages from a category in a blog style format.';

$pluginLangFile['nextButton']  = 'Next';
$pluginLangFile['prevButton']  = 'Previous';

/* CONFIG ************************************************************************************ */

$pluginLangFile['pp_maxPostPage']       = 'Number of post per page';
$pluginLangFile['pp_maxPostPage_tip']   = 'Number of posts that will be shown in each page.';
$pluginLangFile['pp_categorySelection']     = 'Posts Category';
$pluginLangFile['pp_categorySelection_tip'] = 'Category wich contains the pages that will be listed';
$pluginLangFile['pp_skinSelection']     = 'Appearence';
$pluginLangFile['pp_skinSelection_tip'] = 'Select the type of paginator you like';
$pluginLangFile['pp_showDisabledButtons']     = 'Show disabled buttons';
$pluginLangFile['pp_showDisabledButtons_tip'] = 'If it is active then the next and previous buttons will be disabled when they are not needed, else they will be removed.';
$pluginLangFile['pp_showArrows']     = 'Show arrows';
$pluginLangFile['pp_showArrows_tip'] = 'Show arrows representing the next and previous buttons';
$pluginLangFile['pp_addSpaces']     = 'Add space';
$pluginLangFile['pp_addSpaces_tip'] = 'Add space between the paginator buttons';
$pluginLangFile['pp_MoreLinkText']     = 'Post link text';
$pluginLangFile['pp_MoreLinkText_tip'] = 'Text that will be used in the link at the end of the post instead of the default defined in the language file translation';
$pluginLangFile['pp_ShowDate']     = 'Show date';
$pluginLangFile['pp_ShowDate_tip'] = 'Show the publication date of the post';

// -----------------------------------------------------------------------------------------------
// RETURN ****************************************************************************************
// -----------------------------------------------------------------------------------------------
return $pluginLangFile;

?>

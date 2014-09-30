<?php
/**
 * SPANISH (ES) plugin language file
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
$pluginLangFile['feinduraPlugin_description']  = 'Muestra las páginas de una categoría en un formato de lista tipo blog';

$pluginLangFile['nextButton']  = 'Siguiente';
$pluginLangFile['prevButton']  = 'Anterior';

/* CONFIG ************************************************************************************ */

$pluginLangFile['pp_maxPostPage']       = 'Número de Posts por página';
$pluginLangFile['pp_maxPostPage_tip']   = 'Número de posts que se mostrarán en cada página.';
$pluginLangFile['pp_categoryNumber']     = 'Categoría de los posts';
$pluginLangFile['pp_categoryNumber_tip'] = 'Categoría a la que pertenecen las páginas que se utilizarán como posts';
$pluginLangFile['pp_skinSelection']     = 'Apariencia';
$pluginLangFile['pp_skinSelection_tip'] = 'Selecciona la apariencia del páginador entre diferentes tipos';
$pluginLangFile['pp_showDisabledButtons']     = 'Mostrar los botones deshabilitados';
$pluginLangFile['pp_showDisabledButtons_tip'] = 'Si se activa los botones anterior y siguiente en lugar de ocultarse, cuando no sean necesarios, se mostrarán desactivados';
$pluginLangFile['pp_showArrows']     = 'Mostrar flechas';
$pluginLangFile['pp_showArrows_tip'] = 'Muestra los botones anterior y siguiente como flechas en lugar de palabras';
$pluginLangFile['pp_addSpaces']     = 'Separar botones';
$pluginLangFile['pp_addSpaces_tip'] = 'Separa los botones del paginador (por defecto se muestran todos unidos)';
$pluginLangFile['pp_MoreLinkText']     = 'Texto enlace fin post';
$pluginLangFile['pp_MoreLinkText_tip'] = 'Texto que aparecerá en el enlace que se situa al final del resumen del post para acceder al post completo.  Si se deja vacío se utilizará el texto por defecto del idioma correspondiente (recomendable para sitios multilingues).';
$pluginLangFile['pp_ShowDate']     = 'Mostrar fecha';
$pluginLangFile['pp_ShowDate_tip'] = 'Muestra la fecha de publicación del post';

// -----------------------------------------------------------------------------------------------
// RETURN ****************************************************************************************
// -----------------------------------------------------------------------------------------------
return $pluginLangFile;

?>

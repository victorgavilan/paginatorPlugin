<?php
/**
 * @package [Plugins]
 * @subpackage PaginationPlugin
 * 
 * If the key contains certain words, it will create different inputs. The check for this keywords in case insensitive (means "path" and "Path" is the same).
 * 
 * key contains (without the ...):<br>
 * - "...Url"                        The value of this setting will be checked by {@link XssFilter::url()}<br>
 * - "...Path"                       The value of this setting will be checked by {@link XssFilter::path()}<br>
 * - "...Number"                     The value of this setting will be checked by {@link XssFilter::number()}<br>
 * - "...Text" or nothing            The value of this setting will be checked by {@link XssFilter::text()}<br>
 * - "...Selection"                  Will create a <select>. value is also the name and should be an array like: array(0 => 'value1', 1 => 'value2')
 * - "...JsFunction"                 Creates a button, which will call a javascript function with this value as name, like <a href="#" onclick="exampleFunction(); return false;">
 * - "...Hidden"                     It will create a hidden text input field, with the setting value as input value
 * - "...Script"                     It will create a <script> tag with the value as content, before the plugin settings <table> tag.
 * - "...Print"                      It will just display this string after the last plugin setting ..</td></tr> and before the next <tr><td>... This could be used to create custom config settings in the plugin settings table.
 * - if the value is a boolean       It will create a checkbox and will check this value against {@link XssFilter::bool()}<br>
 * 
 *  
 * Example
 * <samp>
 * $pluginConfig['linkPath'] = ''; // would use the path filter
 * </samp>
 * 
 * @see XssFilter::url()
 * @see XssFilter::path()
 * @see XssFilter::number()
 * @see XssFilter::bool()
 * @see XssFilter::text()
 */ 

$pluginConfig['pp_maxPostPage'] = 5;
$pluginConfig['pp_categoryNumber'] = 3;
$pluginConfig['pp_skinSelection'] = array(0=>'simple', 1=>'border', 2=>'2 simple centered buttons', 3=>'2 simple lateral buttons', 4=>'2 bordered centered buttons', 5=>'2 bordered lateral buttons');
$pluginConfig['pp_showDisabledButtons'] = false;
$pluginConfig['pp_showArrows'] = false;
$pluginConfig['pp_addSpaces'] = false;
$pluginConfig['pp_MoreLinkText'] = '';
$pluginConfig['pp_ShowDate'] = true;


return $pluginConfig;
?>

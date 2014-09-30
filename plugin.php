<?php
/*
 * feindura - Flat File Content Management System
 * Copyright (C) Fabian Vogelsteller [frozeman.de]
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not,see <http://www.gnu.org/licenses/>.
 */
/**
 * The plugin file
 *
 * See the README.md for more.
 *
 * The following variables are available in this plugin:
 *
 *     - $feindura                  <- the current {@link Feindura} class instance with all its methods (use "$feindura->..")
 *     - $feinduraBaseURL           <- the base url of the feindura folder, e.g. "http://mysite.com/cms/"
 *     - $feinduraBasePath          <- the base path of the feindura folder, e.g. "/cms/". Be aware that this is a file system path and could differ from an URI path.
 *     - $pluginBaseURL             <- the base url of this plugins folder, e.g. "http://mysite.com/cms/plugins/examplePlugin/"
 *     - $pluginBasePath            <- the base path of this plugins folder, e.g. "/cms/plugins/examplePlugin/". Be aware that this is a file system path and could differ from an URI path.
 *     - $pluginConfig              <- contains the changed settings from the "config.php" from this plugin
 *     - $pluginName                <- the folder name of this plugin
 *     - $pluginNumber              <- the number of the plugin (to differ multiple plugins on the same page)
 *     - $pageContent               <- the pageContent array of the page which contains this plugin
 *     - the GeneralFunctions class <- for advanced methods. It's a static class so use "GeneralFunctions::exampleMethod(..);"
 *
 *
 * Example plugin:
 * <code>
 * <?php
 *
 * echo '<p>Plugin HTML</p>';
 *
 * ?>
 * </code>
 *
 * @package [Plugins]
 * @subpackage PaginationPlugin
 *
 * @author Victor Gavilán <admin@yuiblog.es>
 * @copyright Victor Gavilán
 * @license http://www.gnu.org/licenses GNU General Public License version 3
 *
 */
 
 
 // include the $pluginLangFile
  $pluginCountryCode = (file_exists(dirname(__FILE__).'/languages/'.$feindura->language.'.php'))
	  ? $feindura->language
	  : 'en';
	  
  $pluginLangFile = @include(dirname(__FILE__).'/languages/'.$pluginCountryCode.'.php');
    
 
   $pp_maxPages = 5;  //number of page buttons
   $pp_startPage = 0; //first page button number
   $pp_endPage = 0;   // last page button number   
   $pp_selectedPage = (isset($_GET['pp-page']) )? $_GET['pp-page'] : 1; //page button selected
   $pp_numPages = 0; //total number of pages
   $pp_initPost = ($pp_selectedPage -1) * $pluginConfig['pp_maxPostPage'];//first post of the selected page
   $pp_endPost = 0; //last post of the selected page
   $pp_numPosts = 0; //total number of posts
   
   
   //URL for the paginator links  
   $URL = $_SERVER['REQUEST_URI'];
   
   //Take the URL until pp-page param
   $found = strpos( $URL, 'pp-page');
   $query = ($found !== false) ? substr( $URL, 0, $found) : false;
   
   if ($query !== false) {
    $URL = $query;
   } else {
      if ( strpos( $URL, '?') !== false)     
        $URL .= '&';
      else
        $URL .= '?';
   }


    // get the pages metadata 
    $pp_categorySelect = str_replace( array('(', ')'), '', strstr($pluginConfig['pp_categorySelection'], '(') ); //get the category selected ID
    $pp_metaData = $feindura->loadPagesMetadataByType('category', $pp_categorySelect);

    //If there are posts (pages) in the category then insert them into the page.
    if (is_array($pp_metaData) ) $pp_numPosts = count($pp_metaData);
    
    if ($pp_numPosts > 0){

       $MoreLinkText = true;
       
       if (strlen($pluginConfig['pp_MoreLinkText']) > 0) $MoreLinkText = $pluginConfig['pp_MoreLinkText'];
       
       //Generate the HTML to show the post list
          $pp_pages = $feindura->listPages('cat', $pp_categorySelect, array(200, $MoreLinkText));        
          $page = null;
          require_once dirname(__FILE__). '/post-template.php'; //import the post template function
          
        for ($pp_x = $pp_initPost; $pp_x < $pp_initPost + $pluginConfig['pp_maxPostPage']; $pp_x++) {

            $page = $pp_pages[$pp_x];
            postTemplate($page, $pluginConfig);
            
        }


        //GENERATE PAGINATION
        
        //Buttons text
       $pp_nextButton = '>';
       $pp_prevButton = '<';
   
       if ( strpos( $pluginConfig['pp_skinSelection'], 'buttons' ) > 0 ){ //When only display 2 buttons show de arrows and the text
   
           $pp_nextButton = $pluginLangFile['nextButton']. ' >';
           $pp_prevButton = '< '. $pluginLangFile['prevButton'];
   
       } elseif (!$pluginConfig['pp_showArrows']){ //If show all the buttons only use text
   
           $pp_nextButton = $pluginLangFile['nextButton'];
           $pp_prevButton = $pluginLangFile['prevButton'];
       }
   
        
        $pp_numPages = ceil($pp_numPosts / $pluginConfig['pp_maxPostPage']) ;
  
        //Set the start and end pages
        if ($pp_maxPages > $pp_numPages) { //the number of pages is less than the maxPages var value.
          $pp_startPage = 1;
          $pp_endPage = $pp_numPages;
          
        } else {
          //there is enough pages to fill all the paginator buttons  
          $pp_startPage = $pp_selectedPage -  floor($pp_maxPages / 2); 
          if ($pp_startPage <= 0) $pp_startPage = 1; 
  
          $pp_endPage = $pp_startPage + $pp_maxPages - 1;
          
          //There are not enough pages at the end to position the selected page centered.
          if ($pp_endPage > $pp_numPages){
              $pp_endPage = $pp_numPages;
              $pp_startPage = $pp_endPage - $pp_maxPages + 1; 
          }
        }

        $pp_addSpaces = ($pluginConfig['pp_addSpaces'])? 'addSpaces':'';
        

        //Create de skin class tag
        $pp_skin = ( strpos( $pluginConfig['pp_skinSelection'], 'simple' ) !== false  ) ? 'simple ': 'border ';
        $pp_skin .= ( strpos( $pluginConfig['pp_skinSelection'], 'centered' ) !== false ) ? 'centered ': '';
        $pp_skin .= ( strpos( $pluginConfig['pp_skinSelection'], 'lateral' ) !== false ) ? 'lateral ': '';
        
        $paginatorHTML = '<ul class="'. $pp_skin .' '.$pluginName.' ' . $pp_addSpaces .'">';
        
        //Previous button
        
        $pp_hideClass = "";
        $pp_liContent = '<a href="'.$URL.'pp-page='.($pp_selectedPage - 1).'">'. $pp_prevButton .'</a>';
        
        if ($pp_selectedPage == 1)  {
        
            $pp_hideClass = ($pluginConfig['pp_showDisabledButtons']) ? 'disabled' : 'hidden';
            $pp_liContent = $pp_prevButton;            
        } 
       
        $paginatorHTML .= '<li class="pg-prevButton '. $pp_hideClass .'">'. $pp_liContent .'</li></a>';
                          
        //Pages buttons
        if ( !strpos($pluginConfig['pp_skinSelection'], 'buttons') ){ //Don't display buttons if user selected the option to show only 2 buttons (next and previous)
            
          for ($x = $pp_startPage; $x <= $pp_endPage; ++$x){

              $paginatorHTML .= '<li class="pg-Button ';            
            
              if ($x == $pp_selectedPage) 
                $paginatorHTML .=' selected">'. $x .'</li>';
              else            
                $paginatorHTML .= '"><a href="'.$URL.'pp-page='. $x .'">'. $x .'</a></li>';
          }
        
        }
        //Next button
        $pp_hideClass = "";
        $pp_liContent = '<a href="'.$URL.'pp-page='.($pp_selectedPage + 1).'">'. $pp_nextButton .'</a>';       
        
        if ($pp_endPage == $pp_selectedPage) {
        
          $pp_hideClass = ($pluginConfig['pp_showDisabledButtons']) ? 'disabled' : 'hidden';
          $pp_liContent = $pp_nextButton;            
          
        }
        
          $paginatorHTML .= '<li class="pg-nextButton '. $pp_hideClass .'">'. $pp_liContent .'</li></a>';
        
        //End paginator
        $paginatorHTML .= '</ul>';

        echo $paginatorHTML;
        
    }

  
?>

feindura - Flat File Content Management System
==============================================
Pagination plugin
==============================================
Copyright (C) Victor Gavilán
published under the GNU General Public License version 3

This program is free software;
you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program;
if not,see <http://www.gnu.org/licenses/>.
_____________________________________________

### AUTHOR
Victor Gavilán <http://yuiblog.es>


### DESCRIPTION
This plugin create a blog style page showing a list of pages from the selected category and add a paginator at the end of the page. There are various types of paginator to choose.

You can modify the template use to render the post list in the **post-template.php** file and customize the style in the **css/post-styles.css** file.

If you need use any css library you have to include it in the css directory. For example, this plugin use by default de pure.css library.

The appearance of the paginator can be modified in the **css/paginator-styles.css**.

**The best method to customize the plugin appearance is creating your own css style sheet and overwrite the styles you desire.**


### USAGE
A plugin can be displayed in your website by dragged it directly into the page in the Editor, or using the showPlugins('examplePlugin',$pageId); method from the Feindura class (when this plugin is activated in that page). See http://feindura.org/api/[Implementation]/Feindura.html#showPlugins for more.


### STYLING
Every plugin will be wraped with a `<div class="feinduraPlugins feinduraPlugin_<pluginName>" id="feinduraPlugin_<pluginName>_<currentPageID>">` to make it easy to style.

Using this ID in your styles sheets allows you overwrite the defaults styles.



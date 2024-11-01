<?php
/*
Plugin Name: WP Video Tutor
Plugin URI: http://www.wpvideotutor.com
Description: WP Video Tutor inserts video tutorials into the help section at the top of the pages in your admin panel.
Version: 1
Author: IQ Ace, LLC
Author URI: http://www.iqace.com
*/

/*  Copyright 2010  IQ Ace, LLC  (email : support@iqace.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


add_action('admin_footer', 'wpvt_menu_update');

function wpvt_menu_update() {
echo "<script type='text/JavaScript'>";



/* Get page information */

/* Get the current page */
echo "var wpvt_current = window.location.pathname;";

/* Get the starting and ending position of the file name in the URL */
echo "var wpvt_current_href_start = wpvt_current.lastIndexOf('/') + 1;";
echo "var wpvt_current_href_end = wpvt_current.lastIndexOf('.php');";

/* Get the file name */
echo "var wpvt_current_file_name = wpvt_current.substring(wpvt_current_href_start, wpvt_current_href_end);";



/* Set wpvt_current_file_name to index if there is not a file name after the / */
echo "if (wpvt_current_file_name.match('/wp-admin/'))";
echo "{";
echo "wpvt_current_file_name = 'index';";
echo "};";


/* Edit help menu to insert video link */
echo "document.getElementById('contextual-help-wrap').innerHTML = document.getElementById('contextual-help-wrap').innerHTML + '<center><iframe src=\'http://www.wpvideotutor.com/getvideo/getvideo.php?page=' + wpvt_current_file_name + '\' width=\'540px\' height=\'650px\'></iframe></center>';";


/* End Script Tag */
echo "</script>";
}
?>

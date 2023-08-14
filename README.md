# wp-customizer-for-husky-theme

# to use these files

In your theme functions.php file, include the files:

require 'customizer.mainmenu.php';
require 'customizer.footer.php';

* Above assumes both files are in the same directory as the functions.php

If you want, to make your code cleaner, create a unique directory called "includes" or "customizer"

and reference the code as follows:

require get_stylesheet_directory() . '/customizer/customizer.mainmenu.php';

require get_stylesheet_directory() . '/customizer/customizer.footer.php';

Page View Plugin for Mecha
==========================

This plugin adds a `view` property to the current page with dynamic value once visited by your readers. Each page visit will increment the `view` property value by one.

### Usage

To show the current page views, add this to the `page.php` file in your active shield:

~~~ .php
<?php echo $page->view; ?>
~~~
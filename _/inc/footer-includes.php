    <?php
        // Figure out what our server name is
        $host = $_SERVER['SERVER_NAME'];
        // check if we are in the dev environment
        if ($host == 'localhost' || $host == 'gnu-blog.test' || $host == 'gnu1516.staging.wpengine.com') {
            // we're on dev, so include the JavaScript individually for easier debugging
            include 'footer-scripts.php';
            echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b998e8e29343c88"></script>' . "\n";
        } else {
            // include script version for file versioning on production environment
            include_once 'script-version.php';
            // if production, provide the compiled and uglified JS files
            echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/_/js/gnublog.footer.min.js?v=' . $GLOBALS['SCRIPT_VERSION'] . '"></script>' . "\n";
            echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b998e8e29343c88"></script>' . "\n";
        }
    ?>

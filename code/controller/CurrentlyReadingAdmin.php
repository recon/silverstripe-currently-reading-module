<?php

class CurrentlyReadingAdmin extends ModelAdmin{

    private static $url_segment = 'currently-reading';
    private static $menu_title = 'Currently Reading';
    private static $managed_models = array('CurrentlyReadingBook');
    private static $menu_priority = 0;

}

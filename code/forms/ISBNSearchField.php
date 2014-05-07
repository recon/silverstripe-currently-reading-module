<?php

class ISBNSearchField extends TextField{

    private static $allowed_actions = array(
    );

    public function getAttributes(){
        return array_merge(
                parent::getAttributes(), array(
            'data-prefix' => '',
            'data-suffix' => '?stage=Stage'
                )
        );
    }

    public function Field($properties = array()){
        Requirements::javascript(CURRENTLY_READING_DIR . '/assets/javascript/isbn_search.js');

        return parent::Field($properties);
    }

    public function Type(){
        return 'text isbn-search';
    }

}

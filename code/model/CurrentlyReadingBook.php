<?php

class CurrentlyReadingBook extends Dataobject{

    private static $db = array(
        'Name' => 'Varchar(127)',
        'ISBN13' => 'Varchar(13)',
        'InfoURL' => 'Varchar(255)',
        'ImageURL' => 'Varchar(255)',
        'Authors' => 'Varchar(127)',
        'Status' => 'Enum("Planned, Reading, Finished")',
    );
    private static $indexes = array(
        'UniqueISBN13' => array('type' => 'unique', 'value' => 'ISBN13')
    );
    private static $summary_fields = array(
        'Name', 'ISBN13', 'Authors'
    );
    private static $defaults = array(
        'Status' => 'Reading'
    );
    private static $default_sort = 'Created DESC';
    private static $extensions = array('CurrentlyReadingAdminEnhancements');

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $fields->removeByName('ISBN13');

        $fields->addFieldToTab('Root.Main', $isbnField = new ISBNSearchField('ISBN13', 'ISBN-13'), 'Name');
        $isbnField->setRightTitle("Search a book by ISBN");


        $fields->dataFieldByName('Name')->addExtraClass('target-name');
        $fields->dataFieldByName('InfoURL')->addExtraClass('target-info-url');
        $fields->dataFieldByName('ImageURL')->addExtraClass('target-image-url');
        $fields->dataFieldByName('Authors')->addExtraClass('target-authors');

        return $fields;
    }

}

<?php

class CurrentlyReadingAdminEnhancements extends DataExtension{

    private static $summary_fields = array(
        'FormattedStatus'
    );
    private static $field_labels = array(
        'FormattedStatus' => 'Status'
    );

    public function FormattedStatus(){

        $style = 'font-weight: bold;';
        switch($this->owner->Status){
            case 'Reading':
                $style.='color: orange';
                break;
            case 'Planned':
                $style.='color: gray; font-style: italic;';
                break;
            case 'Finished':
                $style.='color: green';
                break;
        }

        $response = HTMLText::create();
        $response->setValue("<div style='{$style}'>{$this->owner->Status}</div>");
        return $response;
    }

}

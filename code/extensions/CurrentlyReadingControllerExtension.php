<?php

class CurrentlyReadingControllerExtension extends Extension{

    public function CurrentlyReading(){
        $books = DataObject::get('CurrentlyReadingBook')->filter(array('Status' => 'Reading'));

        if(!$books->count()){
            return;
        }

        return $this->owner->customise(array(
                    'Books' => $books,
                ))->renderWith(array('CurrentlyReading_Default')
        );
    }

}

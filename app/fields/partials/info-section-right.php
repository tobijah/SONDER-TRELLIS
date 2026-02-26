<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$infoSectionRight = new FieldsBuilder('info section right');

$infoSectionRight
    ->addTab('info section right', ['placement' => 'left'])
        ->addRepeater('right_column_image', ['layout' => 'block'])
                ->setInstructions('Add an image to the right column of the information section')
                    ->addImage('info_image', ['label' => 'Image'])
            ->endRepeater();        
return $infoSectionRight;
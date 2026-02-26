<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$infoSectionCenter = new FieldsBuilder('info section center');

$infoSectionCenter
    ->addTab('info section center', ['placement' => 'left'])
        ->addRepeater('center_column_image', ['layout' => 'block'])
            ->setInstructions('Add an image to the center column of the information section')
                ->addImage('info_image', ['label' => 'Image'])
        ->endRepeater();    
return $infoSectionCenter;
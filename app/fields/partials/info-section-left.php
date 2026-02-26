<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$infoSectionLeft = new FieldsBuilder('info section left');

$infoSectionLeft
    ->addTab('info section left', ['placement' => 'left'])
        ->addRepeater('left_column_image', ['layout' => 'block'])
            ->setInstructions('Add an image to the left column of the information section')
                ->addImage('info_image', ['label' => 'Image'])
        ->endRepeater();
return $infoSectionLeft;
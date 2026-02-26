<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$backgroundImage = new FieldsBuilder('background-image');

$backgroundImage
    ->addTab('Page background overlay', ['placement' => 'left'])
        ->addImage('background_image', ['label' => 'Page backgroung overlay and footer image'])
            ->setInstructions('Add an image to the background overlay and footer for seasonals');
return $backgroundImage;
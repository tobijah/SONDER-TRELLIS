<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$backgroundImage = new FieldsBuilder('background-image');

$backgroundImage
    ->addTab('Page background overlay', ['placement' => 'left'])
        ->addImage('home_page_background', ['label' => 'Background image for overlay'])
            ->setInstructions('Add image for hero background and footer image. Change this for seasonals');
return $backgroundImage;
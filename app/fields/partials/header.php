<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

$header
    ->addTab('header', ['placement' => 'left'])
        ->addText('greeting', ['label' => 'Seasonal Greeting'])
            ->setInstructions('This is the larg text for the seasonal drinks section.')
        ->addText('season', ['label' => 'Seasonal Title'])
        ->addRepeater('drinks', ['min' => 1, 'layout' => 'block'])
            ->addText('drink_title', ['label' => 'Drink Name', 'required' => 1])
            ->addImage('drink_image', ['label' => 'Drink Image', 'required' => 1])
            ->addLink('drink_link', ['label' => 'URL link for drink checkout', 'required' => 1])
        ->endRepeater();
return $header;
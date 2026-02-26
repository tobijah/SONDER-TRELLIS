<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$galleryCenter = new FieldsBuilder('gallery-center');

$galleryCenter
    ->addTab('gallery center column', ['placement' => 'left'])
        ->addRepeater('center_column', ['max' => 8, 'layout' => 'block'])
            ->setInstructions('Center column gallery content. Choose to use a text, product, or an image.')
                ->addTextArea('gallery_text', ['label' => 'Gallery Textarea'])
                ->addPostObject('product', ['label' => 'Gallery Product', 'post_type' => ['product']])
                    ->addText('product_description', ['label' => 'Short product description'])
                    ->addText('product_ingredients', ['label' => 'Products ingredients'])
                ->addImage('gallery_image', ['label' => 'Gallery Image'])
                    ->setInstructions('Add an image to display in the Gallery')
        ->endRepeater();
return $galleryCenter;
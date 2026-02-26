<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$mobileRightGallery = new FieldsBuilder('mobile right gallery');

$mobileRightGallery
    ->addTab('mobile right gallery', ['placement' => 'left'])
        ->addRepeater('mobile_right_column', ['max' => 8, 'layout' => 'block'])
            ->setInstructions('right column mobile gallery content. Choose to use a text, product, or an image.')
                ->addTextArea('mobile_gallery_text', ['label' => 'Gallery Textarea'])
                ->addPostObject('product', ['label' => 'Gallery Product', 'post_type' => ['product']])
                    ->addText('mobile_product_description', ['label' => 'Short product description'])
                    ->addText('mobile_product_ingredients', ['label' => 'Products ingredients'])
                ->addImage('mobile_gallery_image', ['label' => 'Gallery Image'])
                    ->setInstructions('Add an image to display in the Gallery')
        ->endRepeater();
return $mobileRightGallery;
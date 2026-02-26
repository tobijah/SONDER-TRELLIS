<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('page');

$page
    ->setLocation('post_type', '==', 'page')
    ->setLocation('page_template', '==', 'views/home.blade.php');
  
$page
    ->addFields(get_field_partial('partials.home-page-background'))
    ->addFields(get_field_partial('partials.header'))
    ->addFields(get_field_partial('partials.gallery-left'))
    ->addFields(get_field_partial('partials.gallery-center'))
    ->addFields(get_field_partial('partials.gallery-right'))
    ->addFields(get_field_partial('partials.info-section-left'))
    ->addFields(get_field_partial('partials.info-section-center'))
    ->addFields(get_field_partial('partials.info-section-right'))
    ->addFields(get_field_partial('partials.mobile-left-gallery'))
    ->addFields(get_field_partial('partials.mobile-right-gallery'));

return $page;
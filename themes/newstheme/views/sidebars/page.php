<?php
// CMG Imports
use cmsgears\widgets\dnav\DynamicNav;

// SF Imports
use themes\newstheme\Theme;
?>

<span id='sidebar-knob' class='cmti cmti-2x cmti-menu'></span>

<?= DynamicNav::widget( [ 'view' => $this, 'slug' => Theme::MENU_PAGE, 'options' => [ 'class' => 'vnav' ] ] ) ?>
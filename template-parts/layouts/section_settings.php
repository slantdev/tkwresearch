<?php
/*
 * Section Settings Variables
 */
$section_settings = get_sub_field('section_settings');
$section_background_color = $section_settings['section_background_color'];
$section_background_image = $section_settings['section_background_image'];
$section_text_color = $section_settings['section_text_color'];
$section_style = '';
if ($section_background_color) {
  $section_style .= ' background-color:' . $section_background_color . ';';
}
if ($section_background_image) {
  $section_style .= ' background-image: url(' . $section_background_image['url'] . '); background-size: cover; background-position: center top; background-repeat: no-repeat;';
}
$spacing_top = $section_settings['section_spacing']['spacing_top'];
$spacing_bottom = $section_settings['section_spacing']['spacing_bottom'];
$add_section_anchor = $section_settings['add_section_anchor'];
$section_id = '';
if ($add_section_anchor) {
  $section_id = $section_settings['section_id'];
}
$section_padding_top = '';
switch ($spacing_top) {
  case "none":
    $section_padding_top = 'pt-0';
    break;
  case "xs":
    $section_padding_top = 'pt-4 lg:pt-8 xl:pt-8';
    break;
  case "sm":
    $section_padding_top = 'pt-4 lg:pt-6 xl:pt-14';
    break;
  case "md":
    $section_padding_top = 'pt-8 lg:pt-12 xl:pt-20';
    break;
  case "lg":
    $section_padding_top = 'pt-10 lg:pt-16 xl:pt-28';
    break;
  case "xl":
    $section_padding_top = 'pt-12 lg:pt-20 xl:pt-36';
    break;
  case "2xl":
    $section_padding_top = 'pt-16 lg:pt-24 xl:pt-44';
    break;
  default:
    $section_padding_top = 'pt-12 lg:pt-20 xl:pt-36';
}
$section_padding_bottom = '';
switch ($spacing_bottom) {
  case "none":
    $section_padding_bottom = 'pb-0';
    break;
  case "xs":
    $section_padding_bottom = 'pb-4 xl:pb-8';
    break;
  case "sm":
    $section_padding_bottom = 'pb-4 lg:pb-6 xl:pb-14';
    break;
  case "md":
    $section_padding_bottom = 'pb-8 lg:pb-12 xl:pb-20';
    break;
  case "lg":
    $section_padding_bottom = 'pb-10 lg:pb-16 xl:pb-28';
    break;
  case "xl":
    $section_padding_bottom = 'pb-12 lg:pb-20 xl:pb-36';
    break;
  case "2xl":
    $section_padding_bottom = 'pb-16 lg:pb-24 xl:pb-44';
    break;
  default:
    $section_padding_bottom = 'pb-12 lg:pb-20 xl:pb-36';
}

$section_fullwidth = $section_settings['section_full_width'];
$section_container_class = $section_padding_top . ' ' . $section_padding_bottom  . ' ';
if (!$section_fullwidth) {
  $section_container_class .= 'relative container mx-auto ';
} else {
  $section_container_class .= 'px-4 xl:px-8';
}

$red_line_separator_top = $section_settings['red_line_separator']['enable_top'] ? '<div class="absolute top-0 left-1/2 h-12 border-l border-solid border-brand-red"></div>' : '';
$red_line_separator_bottom = $section_settings['red_line_separator']['enable_bottom'] ? '<div class="absolute bottom-0 left-1/2 h-12 border-l border-solid border-brand-red"></div>' : '';

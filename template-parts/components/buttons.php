<?php
$field = $args['field'];
$class = $args['class'];
if ($field) {
  if (is_array($field)) {
    $buttons = $field;
  } else {
    $buttons = get_sub_field($field);
  }
} else {
  $buttons = get_sub_field('buttons');
}
$buttons_alignment = $buttons['buttons_alignment'];

$button_container_class = $class;
switch ($buttons_alignment) {
  case "left":
    $button_container_class .= ' text-left';
    break;
  case "right":
    $button_container_class .= ' text-right';
    break;
  case "center":
    $button_container_class .= ' text-center mx-auto';
    break;
  default:
    $button_container_class .= ' text-left';
}

$buttons_repeater = $buttons['buttons_repeater'];
if ($buttons_repeater) {
  $button_count = count($buttons_repeater);
  $print_button_margin = "";
  if ($button_count > 1) {
    $print_button_margin = "mr-4 mb-4";
  }
  echo '<div class="mb-6 xl:mb-0 ' . $button_container_class . '">';
  foreach ($buttons_repeater as $button) {
    $button_title = $button['button_link']['title'];
    $button_url = $button['button_link']['url'];
    $button_target = $button['button_link']['target'];

    $button_size = $button['button_size'];
    $button_style = $button['button_style'];
    $button_bg_color = $button['button_bg_color'];
    $button_border_color = $button['button_border_color'];
    $button_text_color = $button['button_text_color'];

    $print_button_class = '';

    switch ($button_style) {
      case "red":
        $print_button_class .= ' btn-red';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "blue":
        $print_button_class .= ' btn-blue';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "white":
        $print_button_class .= ' btn-white';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '#002F56';
        break;
      default:
        $print_button_class .= '';
    }

    switch ($button_size) {
      case "xs":
        $print_button_class .= ' px-4 py-2 text-xs';
        break;
      case "sm":
        $print_button_class .= ' px-5 py-2 xl:px-4 text-sm';
        break;
      case "md":
        $print_button_class .= ' px-6 py-3 text-sm xl:text-base';
        break;
      case "lg":
        $print_button_class .= ' px-8 py-4';
        break;
      case "xl":
        $print_button_class .= ' px-10 py-5';
        break;
      default:
        $print_button_class .= ' px-8 py-3';
    }

    $print_button_style = '';
    if ($button_bg_color) {
      $print_button_style .= 'background-color: ' . $button_bg_color . ';';
    }
    if ($button_text_color) {
      $print_button_style .= 'color: ' . $button_text_color . ';';
    }
    if ($button_url) {
      echo '<a href="' . $button_url . '" class="btn ' . $print_button_class . ' ' . $print_button_margin . '" style="' . $print_button_style . '" title="' . $button_title . '" target="' . $button_target . '"><span>' . $button_title . '</span></a>';
    }
  }
  echo '</div>';
}

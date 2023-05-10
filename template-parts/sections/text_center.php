<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
 * $section_text_color
 * $red_line_separator_top
 * $red_line_separator_bottom
*/

$section_intro = get_sub_field('section_intro');
$sub_headline = $section_intro['sub_headline'];
$headline = $section_intro['headline'];
$lead_text = $section_intro['lead_text'];
$text_color = $section_text_color;
$content = get_sub_field('content');

if ($text_color == 'white') {
  $sub_headline_class = ' text-white border-white';
  $headline_class = ' text-white';
  $content_class = ' text-white';
  $red_line_separator_top = $section_settings['red_line_separator']['enable_top'] ? '<div class="absolute top-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
  $red_line_separator_bottom = $section_settings['red_line_separator']['enable_bottom'] ? '<div class="absolute bottom-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
} else {
  $sub_headline_class = ' text-black border-brand-red';
  $headline_class = ' text-brand-red';
  $content_class = ' text-brand-gray';
}

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container max-w-screen-lg">
      <div class="text-center">
        <?php if ($sub_headline) { ?>
          <h3 class="text-lg pb-4 border-b-2 inline-block mt-12 mx-auto <?php echo $sub_headline_class ?>"><?php echo $sub_headline ?></h3>
        <?php } ?>
        <?php if ($headline) { ?>
          <div class="mt-12 mb-16">
            <h2 class="text-[34px] font-bold  <?php echo $headline_class ?>"><?php echo $headline ?></h2>
          </div>
        <?php } ?>
        <?php if ($lead_text) { ?>
          <?php get_template_part('template-parts/components/description', '', array('field' => 'lead_text', 'group' => 'section_intro', 'class' => 'font-nunito text-2xl mx-auto ' . $content_class)); ?>
        <?php } ?>
      </div>
      <?php if ($content) { ?>
        <?php get_template_part('template-parts/components/description', '', array('field' => 'content', 'class' => 'font-nunito text-lg mx-auto ' . $content_class)); ?>
      <?php } ?>
    </div>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
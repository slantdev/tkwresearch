<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$section_intro = get_sub_field('section_intro');
$sub_headline = $section_intro['sub_headline'];
$headline = $section_intro['headline'];
$description = $section_intro['description'];
$accordion_item = get_sub_field('accordion_item');
$background = get_sub_field('background');
$background_image = $background['background_image'];
$background_color = $background['background_color'];
$text_color = $background['text_color'];

$section_style_2 = '';
if ($background_color) {
  $section_style_2 .= ' background-color: ' . $background_color . ';';
}
if ($background_image) {
  $section_style_2 .= ' background-image: url(' . $background_image['url'] . '); background-size: cover; background-position: center top; background-repeat: no-repeat;';
}
if ($text_color == 'white') {
  $section_style_2 .= ' color: white;';
  $sub_headline_class = ' text-white border-white';
  $headline_class = ' text-white';
  $accordion_title_class = ' text-white border-white';
  $accordion_content_class = ' text-white';
  $red_line_separator_top = $section_settings['red_line_separator']['enable_top'] ? '<div class="absolute top-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
  $red_line_separator_bottom = $section_settings['red_line_separator']['enable_bottom'] ? '<div class="absolute bottom-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
} else {
  $sub_headline_class = ' text-brand-red border-brand-red';
  $headline_class = ' text-brand-red';
  $accordion_title_class = ' text-black border-brand-gray';
  $accordion_content_class = ' text-white';
}

?>

<section id="<?php echo $section_id ?>" class="bg-brand-blue" style="<?php echo $section_style ?><?php echo $section_style_2 ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container max-w-screen-lg text-center">
      <?php if ($sub_headline) { ?>
        <h3 class="text-lg pb-4 border-b-2 inline-block mt-12 mx-auto <?php echo $sub_headline_class ?>"><?php echo $sub_headline ?></h3>
      <?php } ?>
      <?php if ($headline) { ?>
        <div class="mt-12 mb-16">
          <h2 class="text-[34px] font-bold"><?php echo $headline ?></h2>
        </div>
      <?php } ?>
      <?php if ($description) { ?>
        <?php get_template_part('template-parts/components/description', '', array('field' => 'description', 'class' => 'font-nunito text-lg text-white')); ?>
      <?php } ?>
    </div>
    <?php if ($accordion_item) : ?>
      <div class="container max-w-screen-lg">
        <div class="grid grid-cols-1 gap-y-4">
          <?php foreach ($accordion_item as $item) : ?>
            <div tabindex="0" class="collapse collapse-plus">
              <div class="collapse-title text-2xl font-bold border-b-2 py-5 <?php echo $accordion_title_class ?>">
                <?php echo $item['title'] ?>
              </div>
              <div class="collapse-content px-0">
                <div class="prose prose-lg max-w-none px-4 pt-8 <?php echo $accordion_content_class ?>">
                  <?php echo $item['description'] ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$column_text_class = 'lg:w-1/2';
$column_image_class = 'lg:max-w-none lg:w-1/2';
$cta = get_sub_field('cta');
$cta_image = $cta['cta_image'];
$cta_headline = $cta['cta_headline'];
$cta_text = $cta['cta_text'];
$cta_link = $cta['cta_link'];
$text_color = $section_text_color;

if ($text_color == 'white') {
  $headline_class = ' text-white';
  $text_class = ' text-white';
  $link_class = ' text-white';
  $red_line_separator_top = $section_settings['red_line_separator']['enable_top'] ? '<div class="absolute top-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
  $red_line_separator_bottom = $section_settings['red_line_separator']['enable_bottom'] ? '<div class="absolute bottom-0 left-1/2 h-12 border-l border-solid border-white"></div>' : '';
} else {
  $headline_class = ' text-brand-red';
  $text_class = ' text-brand-gray';
  $link_class = ' text-brand-red';
}

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative container max-w-screen-xl mx-auto <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="py-8 lg:py-0 flex flex-wrap lg:flex-nowrap lg:gap-x-16 xl:gap-x-16 3xl:gap-x-24 items-center">
      <div class="w-full order-1 <?php echo $column_image_class ?>">
        <?php if ($cta_image) : ?>
          <div class="mx-auto">
            <img src="<?php echo $cta_image['url'] ?>" alt="<?php echo $cta_image['title'] ?>" class="">
          </div>
        <?php endif; ?>
      </div>
      <div class="w-full order-2 <?php echo $column_text_class ?>">
        <?php if ($cta_headline) : ?>
          <h3 class="text-white text-4xl xl:text-[50px] font-semibold leading-[1.1] mt-8 lg:mt-0 <?php echo $headline_class ?>"><?php echo $cta_headline ?></h3>
        <?php endif; ?>
        <?php if ($cta_text) : ?>
          <div class="text-white text-xl xl:text-2xl mt-8 xl:mt-10  <?php echo $text_class ?>"><?php echo $cta_text ?></div>
        <?php endif; ?>
        <?php if ($cta_link) : ?>
          <div class="mt-8 xl:mt-10">
            <a href="<?php echo $cta_link['url'] ?>" target="<?php echo $cta_link['target'] ?>" class="text-lg xl:text-xl underline font-bold hover:no-underline  <?php echo $link_class ?>"><?php echo $cta_link['title'] ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
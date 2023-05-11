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
$column_image_class = 'max-w-[360px] lg:max-w-none lg:w-1/2';
$quotes = get_sub_field('quotes');
$quote_image = $quotes['quote_image'];
$quote_text = $quotes['quote_text'];
$quote_author = $quotes['quote_author'];

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative container max-w-screen-xl mx-auto <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="flex flex-wrap lg:flex-nowrap lg:gap-x-16 xl:gap-x-16 3xl:gap-x-24">
      <div class="w-full order-1 <?php echo $column_image_class ?>">
        <?php if ($quote_image) : ?>
          <div class="max-w-[360px] mx-auto">
            <div class="aspect-w-1 aspect-h-1">
              <img src="<?php echo $quote_image['url'] ?>" alt="<?php echo $quote_image['title'] ?>" class="rounded-full object-cover h-full w-full">
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="w-full order-2 <?php echo $column_text_class ?>">
        <?php if ($quote_text) : ?>
          <div class="relative font-semibold italic text-brand-red text-[36px] leading-tight">
            <div class="absolute -left-14 -top-8 text-[100px] leading-none">&#8220;</div>
            <?php echo $quote_text ?>
          </div>
        <?php endif; ?>
        <?php if ($quote_author) : ?>
          <div class="border-t border-gray-500 pt-3 font-semibold italic mt-10 text-black text-xl">
            <?php echo $quote_author ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
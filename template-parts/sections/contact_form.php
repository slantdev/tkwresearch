<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$headline = get_sub_field('headline');
$description = get_sub_field('description');
$form_shortcode = get_sub_field('form_shortcode');
?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container max-w-screen-xl">
      <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2 lg:pr-20">
          <?php if ($headline) : ?>
            <h2 class="text-brand-red text-[34px] font-bold mb-4"><?php echo $headline ?></h2>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="prose max-w-none">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="w-full lg:w-1/2">
          <?php if ($form_shortcode) : ?>
            <div class="contactform-2">
              <?php echo do_shortcode($form_shortcode) ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
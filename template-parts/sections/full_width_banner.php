<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$text = get_sub_field('text');
$headline = $text['headline'];
$description = $text['description'];
$button_link = $text['button_link'];

$background = get_sub_field('background');
$background_image = $background['background_image'];
$background_overlay = $background['background_overlay'];

?>
<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative min-h-[320px] bg-black <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="py-6 lg:py-0">
      <div class="container max-w-screen-lg relative z-10">
        <div class="pt-10 text-center">
          <?php if ($headline) : ?>
            <h3 class="text-white text-[40px] xl:text-[54px] leading-1.1 font-light"><?php echo $headline ?></h3>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="text-xl text-white font-nunito mt-6"><?php echo $description ?></div>
          <?php endif; ?>
          <?php if ($button_link) : ?>
            <div class="mt-12">
              <a href="<?php echo $button_link['url'] ?>" class="btn btn-red"><?php echo $button_link['title'] ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="absolute inset-0 w-full h-full z-0">
        <?php if ($background_image) : ?>
          <img src="<?php echo $background_image['url'] ?>" alt="" class="object-cover h-full w-full">
        <?php endif; ?>
        <?php if ($background_overlay) : ?>
          <div class="absolute inset-0 w-full h-full" style="background-color: <?php echo $background_overlay ?>;"></div>
        <?php endif; ?>
      </div>
    </div>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
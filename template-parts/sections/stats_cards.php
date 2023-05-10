<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$sub_headline = get_sub_field('sub_headline');
$headline = get_sub_field('headline');
$description = get_sub_field('description');
$stats_cards = get_sub_field('stats_cards');
$background = get_sub_field('background');
$background_url = isset($background['background_image']['url']) ? $background['background_image']['url'] : '';
$background_overlay = isset($background['overlay_color']) ? $background['overlay_color'] : '';
$overlay_style = '';
if ($background_overlay) {
  $overlay_style = ' background-color: ' . $background_overlay . ';';
}

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative z-20 <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($background_url) : ?>
      <div class="absolute inset-0">
        <div class="absolute inset-0" style="<?php echo $overlay_style ?>"></div>
        <img src="<?php echo $background_url ?>" alt="" class="object-bottom object-cover h-full w-full opacity-100">
      </div>
    <?php endif; ?>
    <div class="container max-w-screen-xl relative pt-16 xl:pt-32 pb-0">
      <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-2/3">
          <?php if ($sub_headline) { ?>
            <h4><span class="inline-block pb-3 border-b-2 border-brand-red text-lg text-black font-medium"><?php echo $sub_headline ?></span></h4>
          <?php } ?>
          <?php if ($headline) { ?>
            <h3 class="text-[34px] leading-tight font-bold text-brand-red mt-6 mb-6"><?php echo $headline ?></h3>
          <?php } ?>
          <?php if ($description) { ?>
            <?php get_template_part('template-parts/components/description', '', array('field' => 'description', 'class' => 'text-lg text-brand-gray')); ?>
          <?php } ?>
        </div>
        <div class="hidden w-full lg:w-1/3">
          <?php echo tkw_icon(array('icon' => 'play-button', 'group' => 'utilities', 'size' => '120', 'class' => 'text-brand-blue mx-auto mt-10')); ?>
        </div>
      </div>
    </div>
    <?php if ($stats_cards) : ?>
      <div class="container max-w-screen-xl relative pt-4 lg:pt-0 pb-16 lg:pb-0 lg:translate-y-1/4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-x-12">
          <?php foreach ($stats_cards as $card) : ?>
            <div class="bg-white rounded-lg p-6 lg:p-10 text-center shadow-[0_0_20px_rgb(225,228,237,1)]">
              <?php
              $number = isset($card['number']) ? $card['number'] : '';
              $title = isset($card['title']) ? $card['title'] : '';
              $description = isset($card['description']) ? $card['description'] : '';
              ?>
              <?php if ($number) : ?>
                <div class="font-light text-[48px] text-brand-red"><?php echo $number ?></div>
                <div class="w-16 h-0.5 bg-brand-blue mx-auto mt-3 mb-5"></div>
              <?php endif; ?>
              <?php if ($title) : ?>
                <h5 class="text-black font-bold text-xl leading-tight mb-4"><?php echo $title ?></h5>
                <?php if ($description) : ?>
                <?php endif; ?>
                <div class="font-nunito">
                  <?php echo $description ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
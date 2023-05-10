<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$pre_headline = get_sub_field('pre_headline');
$headline = get_sub_field('headline');
$description = get_sub_field('description');

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container max-w-screen-md text-center">
      <?php if ($pre_headline) { ?>
        <div class="max-w-prose mx-auto">
          <h3 class="text-lg pb-4 border-b-2 border-brand-red inline-block mx-auto text-black"><?php echo $pre_headline ?></h3>
        </div>
      <?php } ?>
      <?php if ($headline) { ?>
        <div class="max-w-prose mx-auto mt-12 mb-12">
          <h2 class="text-brand-red text-[34px] font-bold"><?php echo $headline ?></h2>
        </div>
      <?php } ?>
      <?php if ($description) { ?>
        <?php get_template_part('template-parts/components/description', '', array('field' => 'description', 'class' => 'font-nunito text-lg text-brand-gray mx-auto')); ?>
      <?php } ?>
    </div>

    <?php
    $features = get_sub_field('features_group')['info_cards'];
    //preint_r($features);
    if ($features) : ?>
      <div class="container max-w-screen-xl mt-16">
        <div class="grid grid-cols-2 gap-6 xl:gap-x-20 xl:gap-y-10">
          <?php foreach ($features as $card) : ?>
            <?php
            $icon_svg = $card['icon_svg'];
            $icon_color = $card['icon_color'];
            $icon_style = '';
            if ($icon_color) {
              $icon_style = 'color: ' . $icon_color;
            }
            $title = $card['title'];
            $description = $card['description'];
            $link = $card['link'];
            ?>
            <?php echo '<div class="relative block p-8 text-center">'; ?>
            <?php if ($icon_svg) { ?>
              <?php echo tkw_icon(array('icon' => $icon_svg, 'group' => 'content', 'size' => '80', 'class' => 'text-brand-blue mx-auto')); ?>
            <?php } ?>

            <?php if ($title) { ?>
              <h5 class="text-slate-800 font-bold text-[22px] mt-8 mb-6"><?php echo $title ?></h5>
            <?php } ?>

            <?php if ($description) { ?>
              <div class="font-nunito">
                <?php echo $description ?>
              </div>
            <?php } ?>

            <?php echo '</div>'; ?>

          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php
    $button = get_sub_field('button');
    if ($button) : ?>
      <div class="container max-w-screen-md mt-20 text-center">
        <?php get_template_part('template-parts/components/buttons', '', array('field' => $button, 'class' => '')); ?>
      </div>
    <?php endif; ?>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
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
$view_all_link = $section_intro['view_all_link'];
$button = get_sub_field('button');
?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="py-6 lg:py-0">
      <div class="container max-w-screen-md text-center">
        <?php if ($sub_headline) { ?>
          <div class="max-w-prose mx-auto">
            <h3 class="text-lg pb-4 border-b-2 border-brand-red inline-block mx-auto text-black"><?php echo $sub_headline ?></h3>
          </div>
        <?php } ?>
        <?php if ($headline) { ?>
          <div class="max-w-prose mx-auto mt-12 mb-12 lg:mb-16">
            <h2 class="text-brand-red text-[34px] font-bold"><?php echo $headline ?></h2>
          </div>
        <?php } ?>
        <?php if ($description) { ?>
          <?php get_template_part('template-parts/components/description', '', array('field' => 'description', 'group' => 'section_intro', 'class' => 'font-nunito text-lg text-brand-gray')); ?>
        <?php } ?>
      </div>
      <div class="container max-w-screen-xl mt-12 lg:mt-24">
        <?php
        $knowledge_box = get_sub_field('knowledge_box');
        $knowledge_box_category = $knowledge_box['knowledge_box_category'];
        $posts_per_page = $knowledge_box['posts_per_page'];
        if (!$posts_per_page) {
          $posts_per_page = 6;
        }
        if ($knowledge_box_category) {
          $args = array(
            'post_type' => 'knowledge_box',
            'posts_per_page' => $posts_per_page,
            'tax_query' => array(
              array(
                'taxonomy' => 'knowledge_box_category',
                'field'    => 'term_id',
                'terms'    => $knowledge_box_category,
              ),
            ),
          );
        } else {
          $args = array(
            'post_type' => 'knowledge_box',
            'posts_per_page' => $posts_per_page,
          );
        }
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
          echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-6">';
          while ($the_query->have_posts()) {
            $the_query->the_post();
            $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
            $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $title =  get_the_title();
            $link = get_the_permalink();
            echo '<a href="' . $link . '" class="flex flex-col bg-white rounded-lg shadow-[0_3px_6px_rgb(0,0,0,.16)] overflow-hidden relative">';
            echo '<div class="aspect-w-16 aspect-h-8">
              <img src="' . $img_src . '" alt="' . $title . '" class="object-cover h-full w-full" />
            </div>';
            echo '<div class="p-8 pb-16 relative">
              <h4 class="line-clamp-2 font-bold text-lg leading-tight text-slate-800 mb-4">' . $title . '</h4>
              <div class="line-clamp-2 font-nunito">' . $excerpt . '</div>
              <div class="absolute right-6 bottom-6">' . tkw_icon(array('icon' => 'plus', 'group' => 'utilities', 'size' => '24', 'class' => 'text-brand-red')) . '</div>
            </div>';
            echo '</a>';
          }
          echo '</div>';
        }
        wp_reset_postdata();
        ?>
      </div>
      <?php
      if ($button) : ?>
        <div class="container max-w-screen-md mt-16 lg:mt-20 text-center">
          <?php get_template_part('template-parts/components/buttons', '', array('field' => $button, 'class' => '')); ?>
        </div>
      <?php endif; ?>
    </div>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
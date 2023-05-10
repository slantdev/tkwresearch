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
$testimonial_posts = get_sub_field('testimonial_posts');

?>

<section id="<?php echo $section_id ?>" style="<?php echo $section_style ?>">
  <div class="relative z-10 <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($headline) : ?>
      <div class="container max-w-screen-md">
        <h3 class="text-[34px] leading-tight font-bold text-brand-red text-center mt-6 mb-6"><?php echo $headline ?></h3>
      </div>
    <?php endif; ?>

    <?php
    if ($testimonial_posts) :
    ?>
      <div id="testimonial-slider" class="swiper max-w-screen-xl mx-auto mt-6 lg:mt-12">
        <div class="swiper-wrapper">
          <?php foreach ($testimonial_posts as $slide) : ?>
            <?php
            $client_name = get_field('client_name', $slide->ID);
            $client_position_company = get_field('client_position_company', $slide->ID);
            $testimonial = get_field('testimonial', $slide->ID);
            $client_image = get_field('client_image', $slide->ID);
            ?>
            <div class="swiper-slide">
              <div class="container max-w-screen-lg text-center text-black">
                <?php if ($testimonial) : ?>
                  <div class="font-nunito text-lg"><?php echo $testimonial ?></div>
                <?php endif; ?>
                <div class="flex flex-col items-center mt-10">
                  <?php if ($client_image) : ?>
                    <img class="rounded-full max-w-[148px]" src="<?php echo $client_image['url'] ?>" alt="">
                  <?php endif; ?>
                  <?php if ($client_name) : ?>
                    <h5 class="text-xl font-bold mt-6 mb-2"><?php echo $client_name ?></h5>
                  <?php endif; ?>
                  <?php if ($client_position_company) : ?>
                    <p class="font-nunito"><?php echo $client_position_company ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev text-brand-red opacity-50 hover:opacity-100"></div>
        <div class="swiper-button-next text-brand-red opacity-50 hover:opacity-100"></div>
      </div>
      <script>
        const testimonial_slider = new Swiper('#testimonial-slider', {
          loop: true,
          slidesPerView: 1,
          autoplay: {
            delay: 7000,
          },
          navigation: {
            nextEl: '#testimonial-slider .swiper-button-next',
            prevEl: '#testimonial-slider .swiper-button-prev',
          },
        });
      </script>
    <?php endif; ?>
    <?php echo $red_line_separator_top ?>
    <?php echo $red_line_separator_bottom ?>
  </div>
</section>
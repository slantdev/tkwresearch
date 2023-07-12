<?php
include get_template_directory() . '/template-parts/layouts/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$hero_slider = get_sub_field('hero_slider');
$white_separator_bottom = get_sub_field('white_separator_bottom');

if ($hero_slider) : ?>
  <section class="">
    <div id="hero-slider" class="swiper bg-black relative h-screen">
      <div class="swiper-wrapper">
        <?php foreach ($hero_slider as $slide) : ?>
          <?php
          $slide_image = $slide['slide_image'];
          $bg_overlay = $slide['bg_overlay'];
          $headline = $slide['headline'];
          $description = $slide['description'];
          $buttons = $slide['buttons'];

          $overlay_style = '';
          if ($bg_overlay) {
            $overlay_style = 'background-color: ' . $bg_overlay;
          }
          ?>
          <div class="swiper-slide overflow-hidden">
            <?php if ($slide_image) : ?>
              <div class="absolute inset-0">
                <div class="absolute inset-0 bg-[#4A4A4A]/70 mix-blend-multiply" style="<?php echo $overlay_style ?>"></div>
                <img src="<?php echo $slide_image['url'] ?>" alt="<?php echo $slide_image['alt'] ?>" class="object-cover h-full w-full opacity-100">
              </div>
            <?php endif; ?>
            <div class="container max-w-screen-xl relative z-10 pt-[180px] pb-10 h-full">
              <div class="flex h-full items-center text-white">
                <div>
                  <?php if ($headline) : ?>
                    <div class="pt-16 pb-10 lg:pt-20 lg:pb-16 relative">
                      <div class="w-full xl:w-3/5">
                        <h1 class="hero-headline"><?php echo $headline; ?></h1>
                      </div>
                      <div class="hero-border"></div>
                    </div>
                  <?php endif; ?>
                  <div class="flex flex-col lg:flex-row lg:gap-x-8 xl:gap-x-14">
                    <?php if ($description) : ?>
                      <div class="w-full lg:w-1/2">
                        <div class="hero-description">
                          <?php echo $description; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="w-full lg:w-1/2 lg:pl-20">
                      <div class="hero-buttons">
                        <?php get_template_part('template-parts/components/buttons', '', array('field' => $buttons, 'class' => 'mt-4 xl:mt-4')); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <?php if ($white_separator_bottom) : ?>
        <div class="hidden xl:block absolute bottom-0 left-0 right-0 w-full z-10">
          <div class="container max-w-screen-xl">
            <div class="h-14 bg-white rounded-t-xl w-full"></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <script>
      const swiper = new Swiper('#hero-slider', {
        loop: true,
        watchOverflow: true,
        effect: 'fade',
        speed: 1000,
        autoplay: {
          delay: 8000,
        },
        navigation: {
          nextEl: '#hero-slider .swiper-button-next',
          prevEl: '#hero-slider .swiper-button-prev',
        },
      });
    </script>
  </section>
<?php endif; ?>
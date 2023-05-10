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
                    <div class="w-1/2 py-20">
                      <h1 class="font-bold text-[60px] leading-[1.1] after:h-3 after:absolute after:left-0 after:block after:bg-brand-blue after:w-full after:-translate-x-1/2 after:mt-8"><?php echo $headline; ?></h1>
                    </div>
                  <?php endif; ?>
                  <div class="flex gap-x-14">
                    <?php if ($description) : ?>
                      <div class="w-1/2">
                        <div class="text-lg font-medium">
                          <?php echo $description; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="w-1/2 pl-20">
                      <?php get_template_part('template-parts/components/buttons', '', array('field' => $buttons, 'class' => 'mt-4 xl:mt-4')); ?>
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
        <div class="absolute bottom-0 left-0 right-0 w-full z-10">
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
        navigation: {
          nextEl: '#hero-slider .swiper-button-next',
          prevEl: '#hero-slider .swiper-button-prev',
        },
      });
    </script>
  </section>
<?php endif; ?>
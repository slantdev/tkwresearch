<?php
$newsletter_title = get_field('newsletter_title', 'option');
$newsletter_form_shortcode = get_field('newsletter_form_shortcode', 'option');
$about = get_field('about', 'option');
$associations_and_accreditation = get_field('associations_and_accreditation', 'option');
$contact_info = get_field('contact_info', 'option');
$footer_links = get_field('footer_links', 'option');
$footer_links_heading = $footer_links['footer_links_heading'];
$links = $footer_links['links'];
$copyright = get_field('copyright', 'option');
$copyright_info = $copyright['copyright_info'];
$powered_by = $copyright['powered_by'];
?>

<footer class="bg-[#545454]">
  <div class="container max-w-screen-xl pt-16 pb-24">

    <div class="bg-tkw-red rounded-lg shadow-md text-white py-8 px-16 flex items-center gap-8 mb-24">
      <?php if ($newsletter_title) : ?>
        <h2 class="text-[1.75rem]"><?php echo $newsletter_title ?></h2>
      <?php endif; ?>

      <?php if ($newsletter_form_shortcode) : ?>
        <div class="grow">
          <?php echo do_shortcode($newsletter_form_shortcode); ?>
        </div>
      <?php endif; ?>

      <!-- <h2 class="text-[1.75rem]">Subscribe to our newsletters</h2>
      <form class="flex gap-4 grow">
        <input type="text" class="grow border-0 border-b-2 border-solid border-white bg-transparent text-white focus:outline-0 focus:ring-0 focus:shadow-none focus:border-white" />
        <input type="submit" value="Send" class="flex-none btn btn-outline bg-transparent border border-solid border-white text-white hover:bg-white hover:text-tkw-red hover:cursor-pointer" />
      </form> -->
    </div>

    <div class="flex gap-12">

      <div class="w-5/12 pb-6 pr-12 border-r border-[#707070] text-white">
        <a href="<?php echo site_url() ?>"><img src="<?php echo tkw_asset('images/logos/logo-reverse.svg') ?>" class="w-52 mb-6"></a>
        <?php if ($about) : ?>
          <div class="pb-6 mb-7 border-b-2 border-[#D8D8D8]">
            <?php echo $about ?>
          </div>
        <?php endif; ?>
        <?php if ($associations_and_accreditation) : ?>
          <h3 class="text-base font-bold mb-4">Associations and Accreditation:</h3>
          <div class="flex gap-4 items-center">
            <?php foreach ($associations_and_accreditation as $logo) : ?>
              <img class="h-auto" style="width: <?php echo $logo['logo_width_px'] ?>px;" src="<?php echo $logo['logo_image']['url'] ?>" alt="<?php echo $logo['logo_image']['alt'] ?>" />
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>


      <div class="w-7/12 text-white">
        <div class="flex gap-x-12">

          <div class="grow">
            <?php if ($contact_info) : ?>
              <h5 class="text-xl font-bold mb-8">Contact Info</h5>

              <?php foreach ($contact_info as $contact) : ?>
                <div class="mb-8 not-italic text-lg t">
                  <div class="flex gap-3">
                    <?php if ($contact['country'] == 'au') {
                      //echo '<img class="w-8 h-8" src="' . tkw_asset('images/flags/au.png') . '" alt="">';
                      echo tkw_icon(array('icon' => 'pinmap', 'group' => 'utilities', 'size' => '24', 'class' => 'mt-0.5'));
                    } else if ($contact['country'] == 'nz') {
                      //echo '<img class="w-8 h-8" src="' . tkw_asset('images/flags/au.png') . '" alt="">';
                      echo tkw_icon(array('icon' => 'pinmap', 'group' => 'utilities', 'size' => '24', 'class' => 'mt-0.5'));
                    } ?>
                    <div class="grow">
                      <?php if ($contact['heading']) : ?>
                        <span class="font-semibold"><?php echo $contact['heading'] ?></span>
                      <?php endif; ?>
                      <?php if ($contact['address']) : ?>
                        <br />
                        <?php echo $contact['address'] ?>
                    </div>
                  <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>

            <?php endif; ?>
          </div>

          <!-- column two -->
          <div class="flex-none">
            <?php if ($links) : ?>
              <?php if ($footer_links_heading) : ?>
                <h3 class="text-xl font-bold mb-8"><?php echo $footer_links_heading ?></h3>
              <?php endif; ?>
              <ul class="list-none text-lg leading-8">
                <?php foreach ($links as $link) : ?>
                  <li class="pb-2"><a href="<?php echo $link['link']['url'] ?>" class="no-underline hover:underline"><?php echo $link['link']['title'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>

        </div>
      </div>

    </div>
  </div>
  <section class="bg-[#E9EBF2]">
    <div class="container max-w-screen-xl mx-auto py-6 flex justify-between">
      <?php if ($copyright_info) : ?>
        <div class="text-sm font-semibold"><?php echo $copyright_info ?></div>
      <?php endif; ?>
      <?php if ($powered_by) : ?>
        <div class="text-sm font-semibold"><?php echo $powered_by ?></div>
      <?php endif; ?>
    </div>
  </section>
</footer>
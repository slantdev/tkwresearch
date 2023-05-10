<?php
$about = get_field('about', 'option');
$contact_info = get_field('contact_info', 'option');
$footer_links = get_field('footer_links', 'option');
?>

<footer class="bg-[#545454]">
  <div class="container max-w-screen-xl pt-16 pb-24">

    <div class="bg-tkw-red rounded-lg shadow-md text-white py-8 px-16 flex items-center gap-8 mb-24">
      <h2 class="text-[1.75rem]">Subscribe to our newsletters</h2>
      <form class="flex gap-4 grow">
        <input type="text" class="grow border-0 border-b-2 border-solid border-white bg-transparent text-white focus:outline-0 focus:ring-0 focus:shadow-none focus:border-white" />
        <input type="submit" value="Send" class="flex-none btn btn-outline bg-transparent border border-solid border-white text-white hover:bg-white hover:text-tkw-red hover:cursor-pointer" />
      </form>
    </div>

    <div class="flex gap-12">
      <div class="w-5/12 pb-6 pr-12 border-r border-[#707070] text-white">
        <a href="#"><img src="<?php echo tkw_asset('images/logos/logo-reverse.svg') ?>" class="w-52 mb-6"></a>
        <p class="pb-6 mb-7 border-b-2 border-[#D8D8D8]">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <h3 class="text-base font-bold mb-4">Associations and Accreditation:</h3>
        <div class="flex gap-4 items-center">
          <img class="w-[72px] h-auto" src="<?php echo tkw_asset('images/logos/logo-privacy-quality-ethics.png') ?>" />
          <img class="w-[72px] h-auto" src="<?php echo tkw_asset('images/logos/logo-iso-experts.png') ?>" />
          <img class="w-[72px] h-auto" src="<?php echo tkw_asset('images/logos/logo-esomar.png') ?>" />
          <img class="w-32 h-auto" src="<?php echo tkw_asset('images/logos/logo-the-research-society.png') ?>" />
        </div>
      </div>

      <div class="w-7/12 text-white">
        <div class="flex gap-x-12">

          <!-- column one -->
          <div class="grow">
            <h3 class="text-xl font-bold mb-8">Contact Info</h3>
            <div class="mb-8 not-italic text-lg">
              <div class="flex gap-3">
                <img src="<?php echo tkw_asset('images/logos/logo-au.png') ?>" class="w-8 h-8" />
                <div class="grow">
                  <span class="font-semibold">MELBOURNE (Head Office)</span><br />
                  83B Hartnett Drive<br />
                  Seaford, VIC, 3198
                </div>
              </div>
            </div>

            <div class="mb-8 not-italic text-lg">
              <div class="flex gap-3">
                <img src="<?php echo tkw_asset('images/logos/logo-au.png') ?>" class="w-8 h-8" />
                <div class="grow">
                  <span class="font-semibold">SYDNEY</span><br />
                  Suite 1<br />
                  345 Pacific Highway<br />
                  North Sydney, 2060 NSW<br />
                </div>
              </div>
            </div>

            <div class="mb-8 not-italic text-lg">
              <div class="flex gap-3">
                <img src="<?php echo tkw_asset('images/logos/logo-au.png') ?>" class="w-8 h-8" />
                <div class="grow">
                  <span class="font-semibold">Auckland</span><br />
                  Level 5<br />
                  210 Khyber Pass Road<br />
                  Grafton, Auckland, 1023 NZ
                </div>
              </div>
            </div>
          </div>
          <!-- column two -->
          <div class="flex-none">
            <h3 class="text-xl font-bold mb-8">TKW Research</h3>
            <ul class="list-none text-lg leading-8">
              <li><a href="#" class="no-underline">CATI</a></li>
              <li><a href="#" class="no-underline">Customer Experience</a></li>
              <li><a href="#" class="no-underline">Qualitative Recruitment</a></li>
              <li><a href="#" class="no-underline">Customer Intercepts</a></li>
              <li><a href="#" class="no-underline">Retail Audits</a></li>
              <li><a href="#" class="no-underline">Compliance Auditing</a></li>
              <li><a href="#" class="no-underline">Mystery Shopping</a></li>
              <li><a href="#" class="no-underline">Bespoke Campaigns</a></li>
              <li><a href="#" class="no-underline">Event Evaluation</a></li>
              <li><a href="#" class="no-underline">Data Input and coding</a></li>
              <li><a href="#" class="no-underline">Online Market Research</a></li>
            </ul>
          </div>

        </div>
      </div>

    </div>
  </div>
  <section class="bg-[#E9EBF2]">
    <div class="container max-w-screen-xl mx-auto py-6 flex justify-between">
      <div class="text-sm font-semibold">© 2023 TKW RESEARCH P/L</div>
      <div class="text-sm font-semibold">Powered by Slant Digital</div>
    </div>
  </section>
</footer>

<!-- <footer class="bg-brand-graylight py-28">
  <div class="container max-w-screen-xl">
    <div class="bg-brand-bluedark rounded-xl p-10">
      <div class="flex gap-x-10 items-center">
        <div class="font-semibold text-[28px] text-white">Subscribe to our newsletters</div>
        <div class="grow flex gap-x-6">
          <input type="email" placeholder="Email address" class="grow text-lg placeholder:text-white/50 bg-transparent border-t-0 border-x-0 border-b-2 border-white focus:outline-none focus:ring-0">
          <button class="inline-block h-auto min-h-min px-8 py-3 border-2 border-white text-lg text-white font-semibold normal-case no-underline rounded-full transition-all duration-300 hover:bg-white hover:text-brand-bluedark">Send</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container max-w-screen-xl mt-16">
    <div class="flex gap-x-12">
      <div class="w-1/3">
        <div class="">
          <img src="<?php echo tkw_asset('images/logo-cdm-direct.svg') ?>" alt="" class="h-32 w-auto">
        </div>
        <?php if ($about['about_company']) : ?>
          <div class="my-6 font-nunito text-lg">
            <?php echo $about['about_company'] ?>
          </div>
        <?php endif; ?>
        <div class="w-20 h-0.5 bg-[#D8D8D8] my-6"></div>
        <?php if ($about['copyright_info']) : ?>
          <div class="text-gray-500">
            <?php echo $about['copyright_info'] ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="w-2/3">
        <div class="flex gap-x-12">
          <div class="grow">
            <?php if ($contact_info) : ?>
              <h5 class="font-bold text-xl leading-tight text-brand-bluedark my-8">Contact Info</h5>
              <div class="flex flex-col gap-y-6">
                <?php foreach ($contact_info as $contact) : ?>
                  <div class="flex gap-x-5">
                    <div class="flex-none">
                      <?php if ($contact['country'] == 'au') {
                        echo '<img class="w-8 h-8" src="' . tkw_asset('images/flags/au.png') . '" alt="">';
                      } else if ($contact['country'] == 'nz') {
                        echo '<img class="w-8 h-8" src="' . tkw_asset('images/flags/au.png') . '" alt="">';
                      } ?>
                    </div>
                    <div class="">
                      <?php if ($contact['heading']) : ?>
                        <h6 class="text-lg font-semibold text-brand-bluedark mb-1"><?php echo $contact['heading'] ?></h6>
                      <?php endif; ?>
                      <?php if ($contact['address']) : ?>
                        <div><?php echo $contact['address'] ?></div>
                    </div>
                  <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="grow">
            <?php if ($footer_links) : ?>
              <h5 class="font-bold text-xl leading-tight text-brand-bluedark my-8">Links</h5>
              <ul class="gap-x-8 columns-2 text-lg">
                <?php foreach ($footer_links as $link) : ?>
                  <li class="pb-2"><a href="<?php echo $link['link']['url'] ?>" class="text-brand-bluedark hover:underline"><?php echo $link['link']['title'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer> -->
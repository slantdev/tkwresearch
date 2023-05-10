<!-- <header class="header w-full absolute z-50">
  <div class="header-top">
    <div class="header-social">
      <ul>
        <li><a href="team.html"><img src="./images/social-icons/social-twitter.svg" alt="Twitter Icon"></a></li>
        <li><a href="voicecomms.html"><img src="./images/social-icons/social-fb.svg" alt="Facebook Icon"></a></li>
        <li><a href="career.html"><img src="./images/social-icons/social-linkedin.svg" alt="LinkedIn Icon"></a></li>
        <li><a href="#"><img src="./images/social-icons/social-email.svg" alt="Email Icon"></a></li>
        <li><a href="#"><img src="./images/social-icons/social-phone.svg" alt="Phone Icon"></a></li>
      </ul>
    </div>
  </div>
  <div class="header-main">
    <div class="header-logo">
      <a href="/"><img src="./images/logos/logo-reverse.svg" alt="TKW Research Logo"></a>
    </div>
    <nav class="header-nav">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="successStory.html">TKW Research</a></li>
        <li><a href="healthcare.html">TKW Healthcare</a></li>
        <li><a href="about.html">Who we are</a></li>
        <li><a href="knowledgebox.html">Knowledge box</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </nav>
    <div class="header-utilities hidden xl:grid grid-flow-col items-center gap-4">
      <div class="btn-wrapper">
        <a href="#" class="btn btn-with-icon btn-with-icon-phone text-sm xl:text-base">1300 878 955</a>
      </div>
      <button class="button-search"><img src="./images/form-icons/search.svg" alt="Search Icon" /></button>
    </div>
  </div>
</header> -->

<header class="site-header absolute w-full top-0 left-0 right-0 z-50">
  <div id="top-nav" class="bg-brand-red text-white">
    <div class="top-nav--container max-w-screen-4xl mx-auto px-4 py-2 md:px-6 xl:px-8">
      <?php
      $links = get_field('links', 'option');
      $twitter = isset($links['twitter']) ? $links['twitter'] : '';
      $facebook = isset($links['facebook']) ? $links['facebook'] : '';
      $linkedin = isset($links['linkedin']) ? $links['linkedin'] : '';
      $youtube = isset($links['youtube']) ? $links['youtube'] : '';
      $email = isset($links['email']) ? $links['email'] : '';
      $phone = isset($links['phone']) ? $links['phone'] : '';
      if ($links) :
      ?>
        <div class="flex justify-end">
          <ul class="top-nav--ul flex gap-x-4">
            <?php if ($twitter) : ?>
              <li><a href="<?php echo $twitter['url'] ?>" target="<?php echo $twitter['target'] ?>"><?php echo tkw_icon(array('icon' => 'twitter', 'group' => 'social', 'size' => '24', 'class' => '')); ?></a></li>
            <?php endif; ?>
            <?php if ($facebook) : ?>
              <li><a href="<?php echo $facebook['url'] ?>" target="<?php echo $facebook['target'] ?>"><?php echo tkw_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => '')); ?></a></li>
            <?php endif; ?>
            <?php if ($linkedin) : ?>
              <li><a href="<?php echo $linkedin['url'] ?>" target="<?php echo $linkedin['target'] ?>"><?php echo tkw_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => '')); ?></a></li>
            <?php endif; ?>
            <?php if ($email) : ?>
              <li><a href="<?php echo $email['url'] ?>" target="<?php echo $email['target'] ?>"><?php echo tkw_icon(array('icon' => 'mail', 'group' => 'utilities', 'size' => '24', 'class' => '')); ?></a></li>
            <?php endif; ?>
            <?php if ($phone) : ?>
              <li><a href="<?php echo $phone['url'] ?>" target="<?php echo $phone['target'] ?>"><?php echo tkw_icon(array('icon' => 'phone', 'group' => 'utilities', 'size' => '24', 'class' => '')); ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div id="main-nav" class="py-2 md:py-3 xl:py-6 transition duration-300">
    <div class="max-w-screen-4xl mx-auto px-4 md:px-6 xl:px-8">
      <div class="flex justify-between items-center">
        <a id="logo" href="<?php echo get_site_url() ?>" class="inline-block relative z-50">
          <img src="<?php echo tkw_asset('images/logo-reverse.svg') ?>" alt="" class="h-24 w-auto">
        </a>
        <div class="flex justify-end items-center gap-x-6 4xl:gap-x-12">
          <?php get_template_part('template-parts/components/megamenu'); ?>
          <div><button class="p-4 rounded-full bg-white"><?php echo tkw_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '24', 'class' => 'text-black')); ?></button></div>
        </div>
      </div>
    </div>
  </div>
</header>
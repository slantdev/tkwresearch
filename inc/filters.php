<?php

function knowledge_box_card_article($atts = array())
{
  $atts = shortcode_atts(array(
    'img_src'  => '',
    'title'  => '',
    'date'  => '',
    'excerpt'  => '',
    'term'  => '',
    'link'  => '#',
  ), $atts);

  $img_src = $atts['img_src'];
  $title = $atts['title'];
  $date = $atts['date'];
  $excerpt = $atts['excerpt'];
  $term = $atts['term'];
  $link = $atts['link'];

  $output = '';
  $output .= '<div>';
  $output .= '<div class="aspect-w-3 aspect-h-2">';
  $output .= '<a href="' . $link . '" class="h-full w-full">';
  $output .= '<img class="w-full h-full object-center object-cover rounded-lg" src="' . $img_src . '" alt="' . $title . '">';
  $output .= '</a>';
  $output .= '</div>';
  $output .= '<div class="mt-6">';
  $output .= '<div class="text-brand-blue mb-4">' . $term . '</div>';
  $output .= '<h3 class="mb-4 font-bold text-[28px] text-slate-800">' . $title . '</h3>';
  $output .= '<div class="mb-4">' . $date . '</div>';
  $output .= '<div class="prose line-clamp-3">';
  $output .= $excerpt;
  $output .= '</div>';
  $output .= '<div class="mt-8">';
  $output .= '<a href="' . $link . '" class="btn btn-primary"><span>Read More</span></a>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}

function filter_knowledge_box()
{
  $catID = $_POST['category'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  if ($catID == 'all') {
    $ajaxposts = new WP_Query([
      'post_type' => 'knowledge_box',
      'posts_per_page' => $postsPerPage,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_status' => 'publish',
    ]);
  } else {
    $ajaxposts = new WP_Query([
      'post_type' => 'knowledge_box',
      'posts_per_page' => $postsPerPage,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => 'knowledge_box_category',
          'field'    => 'term_id',
          'terms'    => $catID,
        ),
      ),
    ]);
  }

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:gap-8 xl:gap-16">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
      $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $title =  get_the_title();
      $date =  get_the_date('j F Y');
      $link = get_the_permalink();
      $terms = get_the_terms(get_the_ID(), 'knowledge_box_category');
      $term = $terms[0]->name;
      $atts = array(
        'img_src' => $img_src,
        'title' => $title,
        'date' => $date,
        'excerpt' => $excerpt,
        'link' => $link,
        'term' => $term
      );
      $response .= knowledge_box_card_article($atts);
    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_knowledge_box', 'filter_knowledge_box');
add_action('wp_ajax_nopriv_filter_knowledge_box', 'filter_knowledge_box');

function search_knowledge_box()
{
  $search_query = $_POST['query'];
  if (isset($_POST['postsperpage'])) {
    $postsPerPage = $_POST['postsperpage'];
  } else {
    $postsPerPage = -1;
  }

  $args = array(
    'post_type' => 'knowledge_box',
    'posts_per_page' => $postsPerPage,
    'orderby' => 'date',
    'order' => 'DESC',
    's' => $search_query,
    'post_status' => 'publish',
  );

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:gap-8 xl:gap-16">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
      $img_src = get_the_post_thumbnail_url(get_the_ID(), 'large');
      $title =  get_the_title();
      $date =  get_the_date('j F Y');
      $link = get_the_permalink();
      $terms = get_the_terms(get_the_ID(), 'knowledge_box_category');
      $term = $terms[0]->name;
      $atts = array(
        'img_src' => $img_src,
        'title' => $title,
        'date' => $date,
        'excerpt' => $excerpt,
        'link' => $link,
        'term' => $term
      );
      $response .= knowledge_box_card_article($atts);
    endwhile;

    $response .= '</div>';
    $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';
  } else {
    $response = '<div class="text-center py-4 px-8">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_search_knowledge_box', 'search_knowledge_box');
add_action('wp_ajax_nopriv_search_knowledge_box', 'search_knowledge_box');

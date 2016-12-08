<?php
namespace WPStarterTheme\Modules\MediaTextBlock;

use WPStarterTheme\Helpers\Module;
use WPStarterTheme\Helpers\Log;
use WPStarterTheme\Helpers\DomNode;

add_image_size('wpsMediaTextBlockLg', 570, 350, true);
add_image_size('wpsMediaTextBlockXs', 768, 500, true);

// Must have good pre-set image sizes. (add_image_size needs to live here)
// Add you min/max image sizes in the fields.json config

add_action('wp_enqueue_scripts', function () {
  Module::enqueueAssets('MediaTextBlock');
});

add_filter('WPStarter/modifyModuleData?name=MediaTextBlock', function ($data) {
  if (empty($data['mediaType'] == 'mediaVideo' && $data['posterImage'])  ) {
    $data['posterImage'] = get_field('defaultPosterImage', 'options');
  }

  if ($data['mediaType'] === 'mediaVideo') {
    $data['oembedLazyLoad'] = DomNode::setSrcDataAttribute(
      $data['oembed'],
      'iframe',
      'src',
      [
        'autoplay' => 'true'
      ]
    );
  }

  $imageConfig = [
    'default' => 'wpsMediaTextBlockLg',
    'sizes' => [
      'wpsMediaTextBlockXs' => '(max-width: 767px)'
    ]
  ];

  $data['image']['imageConfig'] = $imageConfig;
  $data['posterImage']['imageConfig'] = $imageConfig;

  Log::consoleDebug($data);
  return $data;
});
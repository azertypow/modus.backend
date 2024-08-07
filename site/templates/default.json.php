<?php

require_once '_utils/Utils.php';

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

$json = [];

$body = $page->body()->toBlocks()->map(function ($item){

  $profilesImages = $item->profiles()->toStructure()->map(function ($item) {
    return [
      'content' => $item->toArray(),
      'image'   => array_values( Utils::getImageArrayDataInPage($item->image()->toFiles()) ),
    ];
  })->data();

  $content = $item->toArray();

  return [
    'image'     => array_values( Utils::getImageArrayDataInPage($item->image()->toFiles()) ),
    'content'   => $content,
    'profilesImages' => $profilesImages,
  ];
})->data();

$json['options'] = [
  'showInNav'       => $page->showMenu()->toBool(),
  'showNewsletter'  => $page->showNewsletter()->toBool(),
  'headerTitle'     => $page->headerTitle()->value(),
  'headerImage'     => $page->headerImage()->toFile() ? Utils::getJsonEncodeImageData( $page->headerImage()->toFile() ) : null,
];

$json['body'] = $body;

echo json_encode($json);






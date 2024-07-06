<?php

require_once '_utils/Utils.php';

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;

/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

$json = [];

$children = $page->children()->map(function ($item){

  $content = $item->content();

  return [
    'headerImage'     => array_values( Utils::getImageArrayDataInPage( $content->headerimage()->toFiles() ) ),
    'content'   => $content->toArray(),
  ];
})->data();

$json['options'] = [
  'showInNav'       => $page->showMenu()->toBool(),
  'showNewsletter'  => $page->showNewsletter()->toBool(),
  'headerTitle'     => $page->headerTitle()->value(),
  'headerImage'     => $page->headerImage()->toFile() ? Utils::getJsonEncodeImageData( $page->headerImage()->toFile() ) : null,
];

$json['children'] = $children;

echo json_encode($json);






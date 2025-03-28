<?php

require_once '_utils/Utils.php';

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;
/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

$json = [];

$json['page'] = $page->toArray();

$json['power_bi_pages'] = $page->power_bi_pages()->toStructure()->map(function ($item) {
  return [
    'content' => $item->toArray(),
    'image'   => array_values( Utils::getImageArrayDataInPage($item->image()->toFiles()) ),
  ];
})->data();

echo json_encode($json);

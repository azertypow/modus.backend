<?php

require_once '_utils/Utils.php';

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Cms\Site;
/** @global Kirby\Cms\App $kirby */
/** @global Kirby\Cms\Site $site */
/** @global Kirby\Cms\Page $page */

$json = [];


$json['power_bi_link'] = $page->power_bi_link()->value();
$json['title'] = $page->title()->value();



echo json_encode($json);

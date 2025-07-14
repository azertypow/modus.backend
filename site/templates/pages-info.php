<?php
use Kirby\Cms;

/** @var Cms\App $kirby */
/** @var Cms\Site $site */
/** @var Cms\Page $page */
/** @var Cms\User $user */

// Pour forcer le debug brut
header('Content-Type: application/json');

$children = $site->children();

echo json_encode([
  'title' => $site->title()->value(),
  'childCount' => $children->count(),
  'childSlugs' => $children->pluck('slug'),
  'childrenDebug' => $children->toArray(),
]);

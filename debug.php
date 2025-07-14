<?php

require 'kirby/bootstrap.php';

$kirby = new Kirby();

header('Content-Type: application/json');

echo json_encode([
  'site_title' => $kirby->site()->title()->value(),
  'site_id' => $kirby->site()->id(),
  'children_slugs' => $kirby->site()->children()->pluck('slug'),
  'children_debug' => $kirby->site()->children()->toArray(),
]);


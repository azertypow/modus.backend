<?php

echo json_encode([
  'succes'  => $success ?? 'null',
  'alert'   => [
    'error'   =>  esc($alert['error'] ?? 'null'),
    'email'   =>  esc($alert['email'] ?? 'null'),
  ],
  'name'  =>  esc($data['name'] ?? 'null', 'attr'),
  'email' =>  esc($data['email'] ?? 'null', 'attr'),
  'message' =>  esc($data['message'] ?? 'null', 'attr'),
]);

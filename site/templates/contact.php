<?php

echo json_encode([
  'succes'  => $success ?? 'null',
  'alert'   => [
    'error'   =>  $alert['error'] ?? 'null',
    'email'   =>  $alert['email'] ?? 'null',
  ],
  'name'        =>  $data['name']         ?? 'null', 'attr',
  'email'       =>  $data['email']        ?? 'null', 'attr',
  'message'     =>  $data['message']      ?? 'null', 'attr',

  'description' =>  $data['description']  ?? 'null', 'attr',
  'nomProjet'   =>  $data['nomProjet']  ?? 'null', 'attr',
]);

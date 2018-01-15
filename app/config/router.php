<?php

$router = $di->getRouter();

$router->add(
  "/",
  [
    "controller" => "home",
    "action" => "index",
  ]
);
// Define your routes here

$router->handle();

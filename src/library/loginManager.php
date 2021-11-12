<?php

# Read users.json
function getJson($jsonPath) {
  return json_decode(file_get_contents($jsonPath), true);
}
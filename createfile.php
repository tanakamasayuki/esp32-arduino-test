<?php

$file = file_get_contents("https://espressif.github.io/arduino-esp32/package_esp32_index.json");

$data = json_decode($file, true);

foreach ($data['packages'][0]['platforms'] as $key => $item) {
    echo $item['version'] . "\n";
    $data2 = $data;
    $data2['packages'][0]['platforms'] = array();
    $data2['packages'][0]['platforms'][] = $item;
    $json = json_encode($data2, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $filename = "package_esp32_index_" . str_replace('.', '_', $item['version']) . ".json";
    $json = str_replace('"name": "esp32"', '"name": "esp32_' . $item['version'] . '"', $json);
    $json = str_replace('"packager": "esp32"', '"packager": "esp32_' . $item['version'] . '"', $json);
    file_put_contents($filename, $json);
}

$file = file_get_contents("https://espressif.github.io/arduino-esp32/package_esp32_dev_index.json");

$data = json_decode($file, true);

foreach ($data['packages'][0]['platforms'] as $key => $item) {
    echo $item['version'] . "\n";
    $data2 = $data;
    $data2['packages'][0]['platforms'] = array();
    $data2['packages'][0]['platforms'][] = $item;
    $json = json_encode($data2, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $filename = "package_esp32_dev_index_" . str_replace('.', '_', $item['version']) . ".json";
    $json = str_replace('"name": "esp32"', '"name": "esp32_' . $item['version'] . '"', $json);
    $json = str_replace('"packager": "esp32"', '"packager": "esp32_' . $item['version'] . '"', $json);
    file_put_contents($filename, $json);
}

$file = file_get_contents("https://m5stack.oss-cn-shenzhen.aliyuncs.com/resource/arduino/package_m5stack_index.json");

$data = json_decode($file, true);

foreach ($data['packages'][0]['platforms'] as $key => $item) {
    echo $item['version'] . "\n";
    $data2 = $data;
    $data2['packages'][0]['platforms'] = array();
    $data2['packages'][0]['platforms'][] = $item;
    $json = json_encode($data2, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $filename = "package_m5stack_index_" . str_replace('.', '_', $item['version']) . ".json";
    $json = str_replace('"name": "m5stack"', '"name": "m5stack_' . $item['version'] . '"', $json);
    $json = str_replace('"name": "M5Stack"', '"name": "m5stack_' . $item['version'] . '"', $json);
    $json = str_replace('"packager": "m5stack"', '"packager": "m5stack_' . $item['version'] . '"', $json);
    file_put_contents($filename, $json);
}

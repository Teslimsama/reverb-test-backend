<?php
$content = file_get_contents('.env');
file_put_contents('debug_output.json', json_encode(['content' => $content]));
echo "Dumped to debug_output.json";

<?php
if (file_exists('.env')) {
    file_put_contents('env_dump.txt', file_get_contents('.env'));
    echo "Dumped .env to env_dump.txt";
} else {
    echo ".env not found";
}

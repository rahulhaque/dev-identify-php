<?php

require 'src/DevIdentify.php';
use DevIdentify\DevIdentify;

$result = DevIdentify::email('desired_email')->save('full_directory_path_including_file_name_ext')->toJson();

print_r($result);

?>

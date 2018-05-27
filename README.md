# DevIdentify Api Wrapper for PHP
A simple php wrapper for dev-identify image grabber.

## Usage
- Clone or download the repository.
- Require the class to access its functions.

## Example
```php
<?php

require 'src/DevIdentify.php';
use DevIdentify\DevIdentify;

$result = DevIdentify::email('desired_email')
    ->save('full_directory_path_including_file_name_ext') // Path must be present. Make sure you have write permission
    ->toJson(); // toArray() is also available

print_r($result);

?>
```
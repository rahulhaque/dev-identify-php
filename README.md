# DevIdentify Api Wrapper for PHP
A simple php wrapper for dev-identify image grabber.

## Usage
- Clone or download the repository.
- Require the class to access its functions.
- Or install with `composer require dev-identify/dev-identify`

## Example
```php
<?php

require 'src/DevIdentify.php'; // Not needed in laravel
use DevIdentify\DevIdentify;

$result = DevIdentify::email('desired_email')
    ->save('full_directory_path_including_file_name_ext') // See methods description
    ->toJson(); // toArray() is also available

print_r($result);

?>
```

## Methods
- `email()`

    Email method is a static and required method that takes in user email as parameter. Email method holds the actual response from devidentify server. This method returns an object that can be further chained with other methods available. 

- `save()`

    Save method takes in full directory path as parameter along with filename and extension, i.e `/path/image_name.jpg`. Save method will fail if the directory does not exist or has no write permission. This method returns an object that can be further chained with other methods available.
    
- `toJson()`

    ToJson method simply returns the response in json format. Chain this method with either `email()` or `save()` method to see the actual output.
    
- `toArray()`

    ToArray method simply returns the response as an array. Chain this method with either `email()` or `save()` method to see the actual output.
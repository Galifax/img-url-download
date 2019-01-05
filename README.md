## About

This package use to download image from url to your file system

## Instalation
in composer.json 
<pre>
"require": {
    ...
        "galifax/img-url-download": "dev-master"
    ...
}
</pre>
## Usage

<pre>
require_once "vendor/autoload.php";

use Galifax/Image;

$url = https//exaple.com; // image url (.png, .jpg, .gif);

Image::download($url);
</pre>
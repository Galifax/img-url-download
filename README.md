## Instalation
Composer:
<pre>
"require": {
    ...
        "galifax/img-url-download": "dev-master"
    ...
}
</pre>
## Usage

<pre>
<?php
require_once "vendor/autoload.php";

use Galifax/Image;

$url = https//exaple.com; // image url (.png, .jpg, .gif);

Image::download($link);
</pre>
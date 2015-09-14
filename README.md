## SendinBlue Symfony2 Bundle

This is [SendinBlue](https://www.sendinblue.com) provided API V2 Symfony2 Bundle. It implements the various exposed APIs that you can read more about on https://apidocs.sendinblue.com.


## Prerequisites

This version of the bundle requires Symfony 2.x.

## Installation

### Download SendinBlueApiBundle using composer

Add SendinBlueApiBundle in your `composer.json`:

```{
        "require": {
            "sendinblue/sendinblue-api-bundle": "1.0.*"
        }
    }```

Now tell composer to download the bundle by running the command:

```bash
$ composer update
```

OR

Simply install by running below command

```bash
$ composer require "sendinblue/sendinblue-api-bundle"
```

Composer will install the bundle to your project's `vendor/sendinblue` directory.


### Enable the Bundle

In the kernel `app/AppKernel.php`:

```php
<?php

public function registerBundles()
{
    $bundles = array(
        // ...
        new SendinBlue\SendinBlueApiBundle\SendinBlueApiBundle(),
    );
}
```


### Add SendinBlue Api key

In your `app/config/parameters.yml`:

```yaml
sendinblue_api_key: <Your access key>
```


### Usage

The API is available with the `sendinblue_api` service.
To access it, add in your controller (or elsewhere):

```php
<?php
$sendinblue = $this->get('sendinblue_api');
```

### Example

#### Get your account information

```php
<?php
$sendinblue = $this->get('sendinblue_api');

$result = $sendinblue->get_account();
// var_dump($result);
```

#### To send email
```php
<?php

$sendinblue = $this->get('sendinblue_api');

$data = array( "to" => array("to@example.net"=>"to whom!"),
    "cc" => array("cc@example.net"=>"cc whom!"),
    "bcc" => array("bcc@example.net"=>"bcc whom!"),
    "replyto" => array("replyto@email.com","reply to!"),
    "from" => array("from@email.com","from email!"),
    "subject" => "My subject",
    "text" => "This is the text",
    "html" => "This is the <h1>HTML</h1><br/>
               This is inline image 1.<br/>
               <img src=\"{myinlineimage1.png}\" alt=\"image1\" border=\"0\"><br/>
               Some text<br/>
               This is inline image 2.<br/>
               <img src=\"{myinlineimage2.jpg}\" alt=\"image2\" border=\"0\"><br/>
               Some more text<br/>
               Re-used inline image 1.<br/>
               <img src=\"{myinlineimage1.png}\" alt=\"image3\" border=\"0\">",
    "attachment" => array(),
    "headers" => array("Content-Type"=> "text/html; charset=iso-8859-1","X-param1"=> "value1", "X-param2"=> "value2","X-Mailin-custom"=>"my custom value", "X-Mailin-IP"=> "102.102.1.2", "X-Mailin-Tag" => "My tag"),
    "inline_image" => array("myinlineimage1.png" => "your_png_files_base64_encoded_chunk_data","myinlineimage2.jpg" => "your_jpg_files_base64_encoded_chunk_data")
);

$result = $sendinblue->send_email($data);
// var_dump($result);
```

## Support and Feedback

Be sure to visit the SendinBlue official [documentation website](https://apidocs.sendinblue.com) for additional information about our API.

If you find a bug, please submit the issue in [Github directly](https://github.com/mailin-api/sendinblue-api-bundle/issues).

As always, if you need additional assistance, drop us a note [here](https://apidocs.sendinblue.com/support/).

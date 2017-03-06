## SendinBlue Symfony Bundle

This is [SendinBlue](https://www.sendinblue.com) provided API V2 Symfony Bundle. It implements the various exposed APIs that you can read more about on https://apidocs.sendinblue.com.


## Prerequisites

This version of the bundle requires Symfony 2.x OR 3.x.

## Installation

### Download SendinBlueApiBundle using composer

Add SendinBlueApiBundle in your `composer.json`:

```{
        "require": {
            "sendinblue/sendinblue-api-bundle": "2.0.*"
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

In your `app/config/config.yml`:

```yaml
sendin_blue_api:
    api_key: <Your access key>
    # Our library supports a timeout value, which is an optional parameter, default is 30,000 MS ( 30 secs )
    timeout: 5000
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

use SendinBlue\SendinBlueApiBundle\Model\TransactionMailDataModel;

$sendinblue = $this->get('sendinblue_api');

$data = new TransactionMailDataModel();
$data->setTo(array("to@example.net"=>"to whom!"))
	->setCc(array("cc@example.net"=>"cc whom!"))
	->setBcc(array("bcc@example.net"=>"bcc whom!"))
	->setReplyTo(array("replyto@email.com","reply to!"))
	->setFromName('From me')
	->setFromEmail('from@email.com')
	->setSubject('My subject')
	->setText('This is the text')
	->setHtml('This is the <h1>HTML</h1><br/>
                            This is inline image 1.<br/>
                            <img src=\"{myinlineimage1.png}\" alt=\"image1\" border=\"0\"><br/>
                            Some text<br/>
                            This is inline image 2.<br/>
                            <img src=\"{myinlineimage2.jpg}\" alt=\"image2\" border=\"0\"><br/>
                            Some more text<br/>
                            Re-used inline image 1.<br/>
                            <img src=\"{myinlineimage1.png}\" alt=\"image3\" border=\"0\">')
    ->setAttachment(array())
    ->setHeaders(array("Content-Type"=> "text/html; charset=iso-8859-1","X-param1"=> "value1", "X-param2"=> "value2","X-Mailin-custom"=>"my custom value", "X-Mailin-IP"=> "102.102.1.2", "X-Mailin-Tag" => "My tag"))
    ->setInlineImage(array("myinlineimage1.png" => "your_png_files_base64_encoded_chunk_data","myinlineimage2.jpg" => "your_jpg_files_base64_encoded_chunk_data"));


$sendinblue->validateResponse($sendinblue->send_email($data));
```

## Support and Feedback

Be sure to visit the SendinBlue official [documentation website](https://apidocs.sendinblue.com) for additional information about our API.

If you find a bug, please submit the issue in [Github directly](https://github.com/mailin-api/sendinblue-api-bundle/issues).

As always, if you need additional assistance, drop us a note [here](https://apidocs.sendinblue.com/support/).

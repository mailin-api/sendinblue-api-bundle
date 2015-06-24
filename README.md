## SendinBlue Symfony2 Bundle

This is [SendinBlue](https://www.sendinblue.com) provided API V2 Symfony2 Bundle. It implements the various exposed APIs that you can read more about on https://apidocs.sendinblue.com.


## Prerequisites

This version of the bundle requires Symfony 2.x.

## Installation

### Download SendinBlueApiBundle using composer

Add SendinBlueApiBundle in your `composer.json`:

```json
    {
        "require": {
            "sendinblue/sendinblue-api-bundle": "dev-master"
        }
    }
```

Now tell composer to download the bundle by running the command:

```bash
    $ php composer.phar update
```

OR

```bash
    $ composer update
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
    ...
    ?>
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
    ?>
```

###Example

- Get your account information
```php
    <?php
        $sendinblue = $this->get('sendinblue_api');

        $result = $sendinblue->get_account();
        var_dump($result);
    ?>
```

- To send email
```php
    <?php
        $sendinblue = $this->get('sendinblue_api');

        $data = array(
                "to"=>array("to@example.net"=>"to whom!"),
                "cc"=>array("cc@example.net"=>"cc whom!"),
                "bcc"=>array("bcc@example.net"=>"bcc whom!"),
                "replyto"=>array("replyto@email.com","reply to!"),
                "from"=>array("from@email.com","from email!"),
                "subject"=>"My subject",
                "text"=>"This is the text",
                "html"=>"This is the <h1>HTML</h1>",
                "attachment"=>array(),
                "headers"=>array("Content-Type"=> "text/html; charset=iso-8859-1","X-Ewiufkdsjfhn"=> "hello","X-Custom" => "Custom")
            );

        $result = $sendinblue->send_email($data);
        var_dump($result);
    ?>
```

## Support and Feedback

Be sure to visit the SendinBlue official [documentation website](https://apidocs.sendinblue.com) for additional information about our API.

If you find a bug, please submit the issue in [Github directly](https://github.com/mailin-api/sendinblue-api-bundle/issues).

As always, if you need additional assistance, drop us a note [here](https://apidocs.sendinblue.com/support/).
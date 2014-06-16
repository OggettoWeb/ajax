# Oggetto_Ajax

Magento helper module for sending AJAX-responses

## Install via composer

Update your `composer.json` like this

```JSON
    "require": {
        ...
        "magento-hackathon/magento-composer-installer":"*",
        "oggetto/ajax-module": "1.*"
        ...
    },
    "repositories": [
    ...
        {
            "type": "vcs",
            "url": "https://github.com/magento-hackathon/magento-composer-installer"
        },
        {
            "type": "vcs",
            "url": "https://github.com/OggettoWeb/ajax"
        }
    ],
    ...
```

Optionally you can add

```JSON
    "extra":{
        "magento-root-dir": "./",
        "magento-deploystrategy": "copy",
        "auto-append-gitignore": true
    }
```

There is [more](https://github.com/magento-hackathon/magento-composer-installer/blob/master/README.md) information
about composer installer for magento

## Usage

In the controller action which should respond to AJAX request write something like:

```php
$response = Mage::getModel('ajax/response');
try {
  // do things
  $response->success()->setFoo('bar');
} catch(Exception $e) {
  $response->error()->setMessage($e->getMessage());
}
Mage::helper('ajax')->sendResponse($response);
```

If everything is OK you will have the following JSON in the HTTP response body:

```JSON
{"status":"success","foo":"bar"}
```

And in case of exception:
```JSON
{"status":"error","message":"exception message"}
```

In both cases HTTP response will also have `Content-Type` header set:
```HEADER
Content-Type: application/json
```

### Useful helper methods

There are two useful methods which you may like to use:

```php
Mage::helper('ajax')->sendError($message);
```

```php
Mage::helper('ajax')->sendSuccess($data);
```

These methods will automatically build ajax-response object and send it to HTTP response (just like described above).

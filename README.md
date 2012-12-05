Oggetto_Ajax
====

Magento helper module for sending AJAX-responses

Usage
----

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
Content-Type:application/json;
```

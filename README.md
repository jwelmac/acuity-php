# Acuity Scheduling API - PHP Tool Kit

Welcome to the Acuity Scheduling PHP SDK.  This SDK provides examples and a standard library for integrating with the [Acuity Scheduling API](https://acuityscheduling.com/) using PHP.  You can learn more about developing for Acuity Scheduling at [developers.acuityscheduling.com](https://developers.acuityscheduling.com/).

## Installation

This package can be installed with composer or added to your application manually.  To install with composer, first execute in a shell:

```sh
$ composer require acuityscheduling/acuityscheduling
```

Then include the `vendor/autoload.php` in your app.

```php
<?php
require_once('vendor/autoload.php');
```

If you're installing manually, simply include the `AcuityScheduling.php` file in your app.

## Hello World

Here's a basic example to get started.  Just set your [API credentials](https://secure.acuityscheduling.com/app.php?key=api&action=settings) and run:

```php
<?php
require_once('vendor/autoload.php');

$userId = null;
$apiKey = null;

$acuity = new \Acuity\Scheduling(array(
  'userId' => $userId,
  'apiKey' => $apiKey
));

$appointments = $acuity->request('/appointments');
print_r($appointments);
```
## Basic Usage
To specify post fields for `POST` and `PUT` requests use the `'data'` key in the options array and for requests with query parameters eg. `GET` requests, use the `'query'` key.
```php
<?php
// Make the create-appointment request (as admin):
$appointment = $acuity->request('/appointments', array(
  'method' => 'POST',
  'data' => array(
    'appointmentTypeID' => 274497,
    'datetime'          => '2016-04-01T09:00',
    'firstName'         => 'Bob',
    'lastName'          => 'McTest',
    'email'             => 'bob.mctest@example.com'
  ),
  'query' => array(
    'admin' => true
  )
));
```

## Examples

You'll find several examples of different Acuity integrations in the [examples/](examples/) directory.  These examples cover:
* [Basic API Access](#basic-api-access)
* [OAuth2 API Access](#oauth2-api-access)
* [Webhooks](#webhooks)
* [Custom Sidebar](#custom-sidebar)

##### Sample `examples/config.json`

Create a config file with your [API credentials](https://secure.acuityscheduling.com/app.php?key=api&action=settings) to get started.  All examples
share a common config file containing your Acuity `userId` and `apiKey` for basic API access and verifying callbacks.  [OAuth2 examples](#oauth2-api-access) require
additional OAuth2 client account credentials.

```json
{
	"userId": 1,
	"apiKey": "abc123"
}
```

### Basic API Access

[examples/basic/](examples/basic) is a basic API integration for a single account.

Start the example server by doing `php -S localhost:8000 -t examples/basic` and navigate to [127.0.0.1:8000](http://127.0.0.1:8000)

### Create an Appointment

[examples/create-appointment/](examples/create-appointment) is a more advanced API example for scheduling an appointment.  In this example, you'll see how to:

* fetch appoinment types
* find an available date and time
* create the appointment

Start the example server by doing `php -S localhost:8000 -t examples/create-appointment` and navigate to [127.0.0.1:8000](http://127.0.0.1:8000)

### OAuth2 API Access

[examples/oauth2/](examples/oauth2) is an OAuth2 API integration.  Use this to get connected with multiple Acuity accounts.

Create a config file with your OAuth2 credentials to get started.  If you don't have OAuth2 credentials, please fill out this [registration form](https://acuityscheduling.com/oauth2/register).
Start the example server by doing `php -S localhost:8000 -t examples/oauth2` and navigate to [127.0.0.1:8000](http://127.0.0.1:8000)

##### Sample `examples/config.json`
```json
{
	"clientId": "N4HgVZbjHVp3HAkR",
	"clientSecret": "H33vYz88sEiKVbl7EMob1URDrqZrvceSCMmZJpAi",
	"redirectUri": "http://127.0.0.1:8000/oauth2"
}
```

### Webhooks

[examples/webhooks/](examples/webhooks) is a sample webhook integration.

Start the example server by doing `php -S localhost:8000 -t examples/webhooks` and navigate to [127.0.0.1:8000](http://127.0.0.1:8000)

### Custom Sidebar

[examples/custom-sidebar/](examples/custom-sidebar) allows you to display custom information in the appointment details sidebar.

Start the example server by doing `php -S localhost:8000 -t examples/custom-sidebar` and navigate to [127.0.0.1:8000](http://127.0.0.1:8000)

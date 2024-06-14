<?php
set_time_limit(0);

function generateRandomName()
{
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $name = '';
    for ($i = 0; $i < 10; $i++) {
        $name .= $characters[rand(0, 25)];
    }
    $lastName = '';
    for ($i = 0; $i < 10; $i++) {
        $lastName .= $characters[rand(0, 25)];
    }

    return ucfirst($name) . ' ' . ucfirst($lastName);
}

function generateRandomEmail($name)
{
    $domains = [
        "example.com", "test.com", "demo.com", "mail.com", "domain.com",
        "service.com", "webmail.com", "provider.com", "email.com", "site.com",
        "random.com", "user.com", "custom.com", "mailbox.com", "inbox.com",
        "sample.com", "fake.com", "example.org", "demo.net", "mail.org",
        "testmail.com", "fakemail.com", "randomemail.com", "mailprovider.com"
    ];
    $namePart = strtolower(str_replace(" ", ".", $name));
    return $namePart . "@" . $domains[array_rand($domains)];
}

function generateRandomNumber()
{
    $dd = rand(11, 99);
    $number = '';
    for ($i = 0; $i < 9; $i++) {
        $number .= rand(0, 9);
    }

    $number = substr($number, 0, 4) . '-' . substr($number, 4, 4) . '-' . substr($number, 8, 4);
    return '(' . $dd . ') ' . $number;
}

function generateUUID()
{
    $characters = '0123456789abcdef';
    $uuid = '';
    for ($i = 0; $i < 32; $i++) {
        $uuid .= $characters[rand(0, 15)];
    }

    $uuid = substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);
    return $uuid;
}

$request = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($request, '/'));

if (count($parts) == 2 && $parts[0] == 'csv' && is_numeric($parts[1])) {
    $numLines = (int)$parts[1];

    $startTime = microtime(true);

    $response = [
        'success' => true,
        'message' => 'CSV File generated successfully.',
        'execution_time_s' => 0,
        'php_version' => phpversion(),
        'lines' => $numLines,
        'preview_data' => []
    ];

    for ($i = 0; $i < $numLines; $i++) {
        $uuid = generateUUID();
        $name = generateRandomName();
        $email = generateRandomEmail($name);
        $number = generateRandomNumber();
    }

    for ($i = 0; $i < 5; $i++) {
        $uuid = generateUUID();
        $name = generateRandomName();
        $email = generateRandomEmail($name);
        $number = generateRandomNumber();
        $response['preview_data'][] = [
            'uuid' => $uuid,
            'name' => $name,
            'email' => $email,
            'number' => $number
        ];
    }

    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;
    $response['execution_time_s'] = $executionTime;

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid URL. Please use /csv/{count} where {count} is the number of lines to generate.',
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}

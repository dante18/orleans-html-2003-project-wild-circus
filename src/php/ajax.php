<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = [];
    $numberError = 0;
    $incorrectFields = [];

    if (strlen($_POST['firstname']) === 0) {
        $numberError += 1;
        array_push($incorrectFields, 'the field firstname is invalid');
    }

    if (strlen($_POST['lastname']) === 0) {
        $numberError += 1;
        array_push($incorrectFields, 'the field lastname is invalid');
    }

    if (strlen($_POST['email']) === 0 && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $numberError += 1;
        array_push($incorrectFields, 'the field email is invalid');
    }

    if (strlen($_POST['subject']) === 0) {
        $numberError += 1;
        array_push($incorrectFields, 'the field subject is invalid');
    }

    if (strlen($_POST['message']) === 0) {
        $numberError += 1;
        array_push($incorrectFields, 'the field message is invalid');
    }

    if ($numberError > 0) {
        $response['response']['message'] = 'Error';
        $response['response']['incorrectFields'] = $incorrectFields;
    } else {
        $response['response']['message'] = 'Success';
    }

    echo json_encode($response);
}

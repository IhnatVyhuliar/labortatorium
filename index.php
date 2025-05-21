<?php
// index.php

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($isAjax) {
    header('Content-Type: application/json');

    if (!isset($_GET['id'])) {
        echo json_encode(['error' => 'Brak ID w zapytaniu.']);
        exit;
    }

    $id = htmlspecialchars($_GET['id']);
    $data = json_decode(file_get_contents('data.json'), true);

    foreach ($data as $category) {
        foreach ($category as $difficulty) {
            foreach ($difficulty as $questionId => $description) {
                if ((string)$questionId === $id) {
                    echo json_encode(['description' => $description]);
                    exit;
                }
            }
        }
    }

    echo json_encode(['error' => 'Nie znaleziono pytania o podanym ID.']);
    exit;
} else {
    // Handle normal request
    $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
    $description = '';

    if ($id) {
        $data = json_decode(file_get_contents('data.json'), true);
        foreach ($data as $category) {
            foreach ($category as $difficulty) {
                foreach ($difficulty as $questionId => $desc) {
                    if ((string)$questionId === $id) {
                        $description = $desc;
                        break 3;
                    }
                }
            }
        }
    }

    include 'index_template.php';
}

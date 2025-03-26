<?php
class View {
    public static function render($view, $data = []) {
        extract($data); // Chuyển mảng thành biến: ['user' => 'A'] → $user = 'A';
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}

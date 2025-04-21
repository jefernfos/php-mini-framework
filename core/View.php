<?php

namespace Core;

abstract class View
{
    public static function render($data = [], $ajax = false)
    {
        extract($data);

        // Render only the content for AJAX requests.
        if ($ajax) {
            include __DIR__ . '/../src/views/' . $view . '.php';
            return;
        }

        // Render the full layout (header, content, footer) for normal requests.
        include_once __DIR__ . '/../src/views/partials/header.php';
        include_once __DIR__ . '/../src/views/' . $view . '.php';
        include_once __DIR__ . '/../src/views/partials/footer.php';
    }
}
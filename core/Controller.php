<?php

namespace Core;

abstract class Controller
{
    protected function view($data = [])
    {
        // Handle the view for AJAX requests.
        if ($this->isAJAX()) {;
            ob_start();
            View::render($data, true);
            $content = ob_get_clean();
            echo json_encode([
                'title' => $data['title'] ?? null,
                'content' => $content ?? null,
            ]);

            return;
        }

        // Handle the view for normal requests.
        View::render($data);
    }

    // Check if the request is an AJAX request.
    private function isAJAX(): bool
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
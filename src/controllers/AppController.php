<?php

class AppController {

    public function render(string $template = null, array $variables = [])
    {
        // Budowa ścieżki (kropka (.) - złączanie stringów).
        $templatePath = 'public/views/'. $template.'.html';

        // Domyślny output (lepiej zamiast string zrobić stronę z error 404).
        $output = 'File not found';
        
        // Sprawdzamy czy plik istnieje.
        if(file_exists($templatePath)){

            // Wyodrębnienie zmiennych.
            extract($variables);

            // Złączenie zmiennych za pomocą stream.
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}
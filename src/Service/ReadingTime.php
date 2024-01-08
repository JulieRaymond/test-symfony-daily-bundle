<?php

namespace App\Service;

class ReadingTime
{
    public function calculate(string $content): string
    {
        // Compter les mots dans le contenu
        $wordCount = str_word_count(strip_tags($content));

        // Calculer le temps de lecture en fonction du ratio (250 mots par minute)
        $readingTime = ceil($wordCount / 250);

        // Formater la chaîne de résultat
        return "{$readingTime} min";
    }
}

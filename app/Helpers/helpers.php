<?php
if (!function_exists('remove_class_attribute')) {
    function remove_class_attribute($html) {
        $dom = new \DOMDocument();

        // Suppress warnings for invalid HTML
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Get all elements
        $elements = $dom->getElementsByTagName('*');

        foreach ($elements as $el) {
            if ($el->hasAttribute('class')) {
                $el->removeAttribute('class'); // Remove the class attribute
            }
        }

        return $dom->saveHTML();
    }
}

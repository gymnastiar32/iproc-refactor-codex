<?php

namespace App\Http\Middleware;

use Closure;
use DOMDocument;
use DOMElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ApplyTranslations
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! method_exists($response, 'getContent')) {
            return $response;
        }

        $contentType = $response->headers->get('Content-Type', '');
        $content = $response->getContent();

        if (! is_string($content) || ! str_contains($contentType, 'text/html')) {
            return $response;
        }

        if (! str_contains($content, 'data-i18n') && ! str_contains($content, 'data-i18n-placeholder')) {
            return $response;
        }

        $translated = $this->translateHtml($content);

        if ($translated !== null) {
            $response->setContent($translated);
        }

        return $response;
    }

    private function translateHtml(string $html): ?string
    {
        $previousState = libxml_use_internal_errors(true);

        try {
            $dom = new DOMDocument('1.0', 'UTF-8');
            $loaded = $dom->loadHTML(
                '<?xml encoding="UTF-8">' . $html,
                \LIBXML_NOERROR | \LIBXML_NOWARNING
            );

            if (! $loaded) {
                return null;
            }

            foreach ($this->queryElements($dom, '//*[@data-i18n]') as $element) {
                $key = $element->getAttribute('data-i18n');

                if ($key === '' || ! Lang::hasForLocale($key)) {
                    continue;
                }

                $translation = Lang::get($key, [], app()->getLocale(), false);

                if (! is_string($translation)) {
                    continue;
                }

                if ($element->hasAttribute('data-i18n-html')) {
                    $this->replaceInnerHtml($dom, $element, $translation);
                } else {
                    $element->textContent = $translation;
                }
            }

            foreach ($this->queryElements($dom, '//*[@data-i18n-placeholder]') as $element) {
                $key = $element->getAttribute('data-i18n-placeholder');

                if ($key === '' || ! Lang::hasForLocale($key)) {
                    continue;
                }

                $translation = Lang::get($key, [], app()->getLocale(), false);

                if (! is_string($translation)) {
                    continue;
                }

                $element->setAttribute('placeholder', $translation);
            }

            $output = $dom->saveHTML();

            if (! is_string($output)) {
                return null;
            }

            return preg_replace('/^<\?xml.+?\?>/i', '', $output);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousState);
        }
    }

    /**
     * @return list<DOMElement>
     */
    private function queryElements(DOMDocument $dom, string $expression): array
    {
        $xpath = new \DOMXPath($dom);
        $elements = [];

        foreach ($xpath->query($expression) ?: [] as $node) {
            if ($node instanceof DOMElement) {
                $elements[] = $node;
            }
        }

        return $elements;
    }

    private function replaceInnerHtml(DOMDocument $dom, DOMElement $element, string $html): void
    {
        while ($element->firstChild) {
            $element->removeChild($element->firstChild);
        }

        $fragmentDocument = new DOMDocument('1.0', 'UTF-8');
        $loaded = $fragmentDocument->loadHTML(
            '<?xml encoding="UTF-8"><div>' . $html . '</div>',
            \LIBXML_NOERROR | \LIBXML_NOWARNING | \LIBXML_HTML_NODEFDTD | \LIBXML_HTML_NOIMPLIED
        );

        if (! $loaded || ! $fragmentDocument->documentElement) {
            $element->textContent = $html;

            return;
        }

        foreach (iterator_to_array($fragmentDocument->documentElement->childNodes) as $childNode) {
            $importedNode = $dom->importNode($childNode, true);
            $element->appendChild($importedNode);
        }
    }
}

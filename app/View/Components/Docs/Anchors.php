<?php

namespace App\View\Components\Docs;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Symfony\Component\DomCrawler\Crawler;

class Anchors extends Component
{
    /**
     * @var string
     */
    protected $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @throws \DOMException
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.docs.anchors', [
            'anchors' => $this->findAnchors(),
        ]);
    }

    /**
     * @param $contents
     *
     * @throws \DOMException
     *
     * @return array
     */
    private function findAnchors()
    {
        return Cache::remember('doc-anchors-'. sha1($this->content), now()->addHours(2), function (){


            $crawler = new Crawler();
            $crawler->addHtmlContent($this->content);

            $anchors = [];

            $crawler
                ->filter('h2,h3')
                ->each(function ($elm) use (&$anchors) {

                    /** @var Crawler $elm */
                    /** @var \DOMElement $node */
                    $node = $elm->getNode(0);
                    $text = $node->textContent;
                    $id = Str::slug($text);

                    $anchors[] = [
                        'text'  => $text,
                        'level' => $node->tagName,
                        'id'    => $id,
                    ];

                    while ($node->hasChildNodes()) {
                        $node->removeChild($node->firstChild);
                    }

                    $node->appendChild(new \DOMElement('a', e($text)));
                    $node->firstChild->setAttribute('href', '#'.$id);
                    $node->firstChild->setAttribute('name', $id);
                });

            return $anchors;

        });

    }
}

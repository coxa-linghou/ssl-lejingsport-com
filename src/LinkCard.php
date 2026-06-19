<?php

class LinkCard
{
    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'siteUrl' => 'https://ssl-lejingsport.com',
            'siteName' => '乐竞体育',
            'title' => '乐竞体育 - 专业体育赛事平台',
            'description' => '提供丰富的体育赛事资讯与互动体验',
            'imageUrl' => '/images/default-card.png',
        ], $config);
    }

    public function setConfig(array $config): void
    {
        $this->config = array_merge($this->config, $config);
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function renderHtml(): string
    {
        $siteUrl = htmlspecialchars($this->config['siteUrl'], ENT_QUOTES, 'UTF-8');
        $siteName = htmlspecialchars($this->config['siteName'], ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($this->config['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($this->config['description'], ENT_QUOTES, 'UTF-8');
        $imageUrl = htmlspecialchars($this->config['imageUrl'], ENT_QUOTES, 'UTF-8');

        $html = '<div class="link-card">' . "\n";
        $html .= '    <a href="' . $siteUrl . '" target="_blank" rel="noopener noreferrer" class="link-card-inner">' . "\n";
        $html .= '        <div class="link-card-image">' . "\n";
        $html .= '            <img src="' . $imageUrl . '" alt="' . $siteName . '" loading="lazy" />' . "\n";
        $html .= '        </div>' . "\n";
        $html .= '        <div class="link-card-content">' . "\n";
        $html .= '            <span class="link-card-site">' . $siteName . '</span>' . "\n";
        $html .= '            <h3 class="link-card-title">' . $title . '</h3>' . "\n";
        $html .= '            <p class="link-card-description">' . $description . '</p>' . "\n";
        $html .= '        </div>' . "\n";
        $html .= '    </a>' . "\n";
        $html .= '</div>' . "\n";

        return $html;
    }

    public function renderCardOnly(): string
    {
        $siteUrl = htmlspecialchars($this->config['siteUrl'], ENT_QUOTES, 'UTF-8');
        $siteName = htmlspecialchars($this->config['siteName'], ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($this->config['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($this->config['description'], ENT_QUOTES, 'UTF-8');
        $imageUrl = htmlspecialchars($this->config['imageUrl'], ENT_QUOTES, 'UTF-8');

        return sprintf(
            '<a href="%s" target="_blank" rel="noopener noreferrer" class="link-card-simple">' .
            '<img src="%s" alt="%s" />' .
            '<span>%s</span>' .
            '<strong>%s</strong>' .
            '<small>%s</small>' .
            '</a>',
            $siteUrl,
            $imageUrl,
            $siteName,
            $siteName,
            $title,
            $description
        );
    }

    public function renderWithStyle(): string
    {
        $style = <<<CSS
<style>
.link-card { display: inline-block; max-width: 360px; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; font-family: sans-serif; }
.link-card-inner { text-decoration: none; color: inherit; display: block; }
.link-card-image img { width: 100%; height: auto; display: block; }
.link-card-content { padding: 12px; }
.link-card-site { font-size: 12px; color: #666; text-transform: uppercase; }
.link-card-title { margin: 6px 0 4px; font-size: 16px; color: #222; }
.link-card-description { margin: 0; font-size: 14px; color: #555; }
.link-card-simple { display: inline-flex; align-items: center; gap: 8px; padding: 8px; border: 1px solid #ddd; border-radius: 6px; text-decoration: none; color: inherit; }
.link-card-simple img { width: 48px; height: 48px; object-fit: cover; border-radius: 4px; }
</style>
CSS;
        return $style . "\n" . $this->renderHtml();
    }

    public static function createDefault(): self
    {
        return new self([
            'siteUrl' => 'https://ssl-lejingsport.com',
            'siteName' => '乐竞体育',
            'title' => '乐竞体育 - 专业赛事',
            'description' => '乐竞体育提供全面体育资讯',
            'imageUrl' => '/images/lejing-sport.png',
        ]);
    }
}
<?php
class ControllerExtensionFeedGoogleSitemap extends Controller {
    protected $mainSitemap;

    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->mainSitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>');
    }

    public function index(): void
    {
        if ($this->config->get('feed_google_sitemap_status')) {

            $this->load->model('catalog/product');
            $this->load->model('tool/image');

            $this->generateProducts();

            $this->load->model('catalog/category');

            $this->generateCategories(0);

            $this->load->model('catalog/manufacturer');

            $this->generateManufacturers();

            $this->load->model('catalog/information');

            $this->generateInformation();

            $this->saveXml($this->mainSitemap, 'sitemap.xml');

        }
    }
    protected function generateProducts(): void
    {
        $products = $this->model_catalog_product->getProductsForSitemap();

        $products_per_file = 500;

        $total_files = ceil(count($products) / $products_per_file);

        for ($i = 0; $i < $total_files; $i++) {
            $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

            $segment_products = array_slice($products, $i * $products_per_file, $products_per_file);

            foreach($segment_products as $product){
                $this->addChild($sitemap,
                    $this->url->link('product/product', 'product_id=' . $product['product_id']),
                    $product['date_modified'],
                    '1.0',
                    $product['image'],
                    $product['name']
                );
            }
            $this->saveXml($sitemap, "sitemap_{$i}.xml");
        }
    }

    protected function generateCategories($parent_id, $current_path = '', $sitemap = ''): void
    {
        $results = $this->model_catalog_category->getCategories($parent_id);
        if ($current_path == '')
            $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

        foreach ($results as $category) {
            if (!$current_path) {
                $new_path = $category['category_id'];
            } else {
                $new_path = $current_path . '_' . $category['category_id'];
            }
            $this->addChild($sitemap,
                $this->url->link('product/category', 'path=' . $new_path),
                $category['date_modified'],
                '0.8',
                $category['image'],
                $category['name']
            );

            $this->generateCategories($category['category_id'], $new_path, $sitemap);
        }
        if ($current_path == '')
            $this->saveXml($sitemap, 'category.xml');
    }

    protected function generateManufacturers():void
    {
        $manufacturers = $this->model_catalog_manufacturer->getManufacturers();

        $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

        foreach ($manufacturers as $manufacturer) {
            $this->addChild($sitemap,
                $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $manufacturer['manufacturer_id']),
                '',
                '0.7',
                $manufacturer['image'],
                $manufacturer['name']
            );
        }

        $this->saveXml($sitemap, 'manufacturer.xml');

    }

    protected function generateInformation():void
    {
        $informationList = $this->model_catalog_information->getInformations();

        $sitemap = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

        foreach ($informationList as $information) {
            $this->addChild($sitemap,
                $this->url->link('information/information', 'information_id=' . $information['information_id']),
                '',
                '0.5',
                '',
                ''
            );
        }

        $this->saveXml($sitemap, 'information.xml');
    }

    protected function addChild($sitemap, $loc, $lastmod, $priority, $imgage, $imgText):void
    {
        $item = $sitemap->addChild('url');
        $item->addChild('loc', $loc);
        $item->addChild('changefreq', 'weekly');
        if ($lastmod !== '')
            $item->addChild('lastmod', date('Y-m-d', strtotime($lastmod)) );
        $item->addChild('priority', $priority);
        if ($imgage !== '' && $imgage !== null && $imgage !== 'null'){
            $image = $item->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
            $image->addChild('image:loc', $this->model_tool_image->resize($imgage, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')), 'http://www.google.com/schemas/sitemap-image/1.1');
            $image->addChild('image:caption', $imgText, 'http://www.google.com/schemas/sitemap-image/1.1');
            $image->addChild('image:title', $imgText, 'http://www.google.com/schemas/sitemap-image/1.1');
        }

    }

    protected function saveXml($sitemap, $name): void
    {
        $sitemap->asXML('/home/kaielect/public_html/sitemap/' . $name);
        if ($name !== 'sitemap.xml')
            $this->addToMainSitemap('https://kaielectric.com/sitemap/' . $name);
    }

    protected function addToMainSitemap($url): void
    {
        $mainSitemapSM = $this->mainSitemap->addChild('sitemap');
        $mainSitemapSM->addChild('loc', $url);
    }
}

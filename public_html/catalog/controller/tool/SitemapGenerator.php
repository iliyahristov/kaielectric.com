<?php
class SitemapGenerator {
    private $sitemapPath;
    private $categoryLimit = 100;
    private $registry;
    private $load;

    public function __construct($registry) {
        
        $this->sitemapPath = '/home/kaielect/public_html/sitemap/';
        $this->registry = $registry;
        $this->load = $registry->get('load');
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');
        if (!file_exists($this->sitemapPath)) {
            mkdir($this->sitemapPath, 0777, true);
        }
    }

    public function generateSitemap() {
        // $this->load = new Loader($this->registry);
        
// 		$this->load->model('catalog/category');

// 		$this->load->model('catalog/product');
		
        $this->generateCategorySitemap();
        $this->generateProductSitemaps();
    }

    protected function generateCategorySitemap() {
        $categories = $this->getCategories();
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

        foreach ($categories as $category) {
            $url = $xml->addChild('url');
            $url->addChild('loc', $this->getCategoryUrl($category['category_id']));
        }

        $xml->asXML($this->sitemapPath . 'sitemap_categories.xml');
    }

    protected function generateProductSitemaps() {
        $products = $this->getProducts();
        $chunkedProducts = array_chunk($products, $this->categoryLimit);

        foreach ($chunkedProducts as $index => $productChunk) {
            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

            foreach ($productChunk as $product) {
                $url = $xml->addChild('url');
                $url->addChild('loc', $this->getProductUrl($product['product_id']));
            }

            $xml->asXML($this->sitemapPath . "sitemap_{$index}.xml");
        }

        $this->updateMainSitemap($chunkedProducts);
    }

    protected function updateMainSitemap($productChunks) {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>');

        foreach ($productChunks as $index => $chunk) {
            $sitemap = $xml->addChild('sitemap');
            $sitemap->addChild('loc', $this->getSitemapUrl($index));
        }

        $xml->asXML($this->sitemapPath . 'sitemap.xml');
    }

    protected function getCategories() {
        $categories = array();

        // Load OpenCart category model
        // $this->load->model('catalog/category');
        $productCategory = $this->registry->get('model_catalog_category');
        $categories = $productCategory->getCategories();

        return $categories;
    }

    protected function getProducts() {
        // Replace with your actual code to get products from OpenCart database
        $products = array();

        // Load OpenCart product model
        // $this->load->model('catalog/product');
        $productProduct = $this->registry->get('model_catalog_product');
        $products = $productProduct->getProducts();
        
        return $products;
    }

    protected function getCategoryUrl($category_id) {
        // Replace with your actual code to generate category URL
        return 'https://kaielectric.com/category/' . $category_id;
    }

    protected function getProductUrl($product_id) {
        // Replace with your actual code to generate product URL
        return 'https://kaielectric.com/product/' . $product_id;
    }

    protected function getSitemapUrl($index) {
        return 'https://kaielectric.com/sitemap/sitemap_' . $index . '.xml';
    }
}

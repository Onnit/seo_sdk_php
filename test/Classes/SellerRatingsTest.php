<?php

namespace BazaarvoiceSeo;

use PHPUnit\Framework\TestCase;

/**
 * Test SellerRatings class.
 */
class SellerRatingsTest extends TestCase {

    protected function getParams() {
        $params = array(
            'bv_root_folder' => 'test',
            'subject_id' => 'test',
            'cloud_key' => 'test',
            'staging' => FALSE,
            'testing' => FALSE,
            'crawler_agent_pattern' => 'msnbot|google|teoma|bingbot|yandexbot|yahoo',
            'ssl_enabled' => FALSE,
            'content_type' => 'reviews',
            'subject_type' => 'seller',
            'execution_timeout' => 500,
            'execution_timeout_bot' => 2000,
            'local_seo_file_root' => '/load/seo/files/locally',
            'load_seo_files_locally' => TRUE,
            'seo_sdk_enabled' => TRUE,
            'proxy_host' => '',
            'proxy_port' => '',
            'charset' => 'UTF-8',
            'base_url' => '/base/url',
            'page_url' => '/page/url&debug=true',
            'include_display_integration_code' => TRUE,
        );
        return $params;
    }

    public function testGetContent() {
        $params = $this->getParams();
        $_SERVER['HTTP_USER_AGENT'] = "google";

        $obj = new SellerRatings($params);
        $res = $obj->getContent();

        $this->assertNotEmpty($res);
    }


}
<?php

require_once 'bvseosdk.php';
require_once 'test/config.php';

/**
 * Test BV class;
 */
class BVTest extends PHPUnit_Framework_testCase
{
    var $params = array(
        'bv_root_folder' => 'test',
        'subject_id' => 'test',
        'cloud_key' => 'test',
    );

    protected static function getMethod($obj, $name)
    {
        $class = new ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function test_getCurrentUrl()
    {
        $_SERVER = array(
            'HTTPS' => 'on',
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => '80',
            'REQUEST_URI' => '/index.php?bvreveal=debug',
            'HTTP_USER_AGENT' => 'google',
        );
        $obj = new BV($this->params);
        $getCurrentUrl = self::getMethod($obj, '_getCurrentUrl');
        $res = $getCurrentUrl->invokeArgs($obj, array());

        $this->assertEquals('https://localhost:80/index.php?bvreveal=debug', $res);

        $_SERVER = array(
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => '80',
            'REQUEST_URI' => '/index.php?bvreveal=debug',
            'HTTP_USER_AGENT' => 'google',
        );
        $obj = new BV($this->params);
        $getCurrentUrl = self::getMethod($obj, '_getCurrentUrl');
        $res = $getCurrentUrl->invokeArgs($obj, array());

        $this->assertEquals('http://localhost/index.php?bvreveal=debug', $res);

        $_SERVER = array(
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => '88',
            'REQUEST_URI' => '/index.php?bvreveal=debug',
            'HTTP_USER_AGENT' => 'google',
        );

        $obj = new BV($this->params);
        $getCurrentUrl = self::getMethod($obj, '_getCurrentUrl');
        $res = $getCurrentUrl->invokeArgs($obj, array());

        $this->assertEquals('http://localhost:88/index.php?bvreveal=debug', $res);
    }

    public function test_parsePageUrl() {
        $_SERVER = array(
            'HTTPS' => 'on',
            'SERVER_NAME' => 'localhost',
            'SERVER_PORT' => '80',
            'REQUEST_URI' => '/index.php?bvreveal=debug',
            'HTTP_USER_AGENT' => 'google',
        );
        $this->params['page_url'] = 'localhost/index.php?bvstate=ct:q/st:c/pg:2';
        $obj = new BV($this->params);
        $parsePageUrl = self::getMethod($obj, '_parsePageUrl');
        $res = $parsePageUrl->invokeArgs($obj, array(&$this->params));

        $this->assertEquals($this->params['bv_page_data']['bvstate'], "ct:q/st:c/pg:2");
        $this->assertEquals($res['page'], "2");
        $this->assertEquals($res['content_type'], "questions");
        $this->assertEquals($res['subject_type'], "category");
    }

}

<?php
//Please provide cloud_key, bv_root_folder and subject_id
require __DIR__ . '/vendor/autoload.php';
$bv = new BazaarvoiceSeo\BV(array(
    'bv_root_folder' => getenv('BAZAARVOICE_DEPLOY_ZONE', true),
    'subject_id' => 'Alpha_BRAIN__',
    'cloud_key' => getenv('BAZAARVOICE_SEO_CLOUD_KEY', true),
    'page_url' => 'http://local.onnit.com/alphabrain/',
    'base_url' => 'http://local.onnit.com/alphabrain/',
    'staging' => filter_var(getenv('BAZAARVOICE_SEO_STAGING', true), FILTER_VALIDATE_BOOLEAN)
));
?><!DOCTYPE html>
<html>
<head>
    <title>BV SDK PHP Example - Questions: GetContent</title>
</head>
<body>
This is a test page for Questions: getContent<br>
This will return questions and answers content<br><br>

<div id="BVQAContainer">
    <?php echo $bv->questions->getContent(); ?>
</div>

</body>
</html>

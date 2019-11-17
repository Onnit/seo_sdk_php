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
    <title>BV SDK PHP Example - getAggregateRating</title>
</head>
<body>
This is a test page for Reviews: getAggregateRating()<br>
This will return aggregate rating content<br><br>
<div id="BVRRSummaryContainer">
    <?php echo $bv->reviews->getAggregateRating(); ?>
</div>
</body>
</html>

<?php
error_reporting(0);

//This code must be included at the top of your script before any output is sent to the browser
//-even before <!DOCTYPE> declaration
require_once realpath(dirname(__FILE__) . "/resources/konnektiveSDK.php");
$pageType = "catalogPage"; //choose from: presalePage, leadPage, checkoutPage, upsellPage1, upsellPage2, upsellPage3, upsellPage4, thankyouPage
$deviceType = "ALL"; //choose from: DESKTOP, MOBILE, ALL
$ksdk = new KonnektiveSDK($pageType, $deviceType);
$offers = $ksdk->getOffers();
include 'includes/data.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $product->rand_head ?>
    </title>

    <meta name="viewport" content="width=device-width"/>
    <meta charset="utf-8"/>


    <?php
    //this line of code must go either inside the <head> </head> tags or inside the <body></body> tags
    $ksdk->echoJavascript();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script>
        window.product = <?php echo json_encode($product); ?>;
        window.data = <?php echo json_encode($data); ?>;
    </script>
    <script src="/resources/js/cart.min.js"></script>

    <link rel="stylesheet" type="text/css" href="resources/css/fonts/fonts.css">
    <link rel="stylesheet" type="text/css" href="resources/css/shopify.css?1=2">
    <link rel="stylesheet" type="text/css" href="resources/css/stamped-reviews.css">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header class="container-fluid p-0">
    <div class="blue-line text-center">
        <?php echo $product->head ?>
    </div>
    <div class="d-flex justify-content-between main-part">
        <div class="logo">
            <img src="resources/images/feg-serum-logo.jpg"/>
        </div>
        <button class="cart-button">
            <i class="fa fa-shopping-basket"></i>
        </button>
    </div>
</header>
<div class="container-fluid position-absolute cart-container d-none">
    <div class="row justify-content-end">
        <div class="col-12 col-sm-8 col-md-7 col-lg-5 p-0 cart">
        </div>
    </div>
</div>
<div class="container">
   
</div>


<div class="container mt-5" style="clear:both;">
    <div class="row">
        <div class="col-lg-8 col-sm-12 product-description">
            <?php include 'includes/description-email.php' ?>
        </div>
    </div>

</div>
<div class="container-fluid bottom-add-to-cart">
    <div class="row">
        <div class="col-12 persons-online">
            <i class="fa fa-users">&nbsp;</i><span>222</span> <?= T('people are looking at the same product as you'); ?>
        </div>
        <div class="col-12">
            <button class="add-to-cart"><?php echo $product->add_to_cart ?></button>
        </div>
    </div>
</div>
<?php include_once('pixelcode/pixelhelper.php'); ?>


<script src="resources/js/main.min.js?1=2"></script>


<script lang="template/html" type="template/html" id="CartBottomTemplate">
    <div class="container cart-bottom">
        <div class="row">
            <div class="col-12 name">
                <div><a class="checkout-button" target="_top" href="/checkout.php"><?= T('Check Out'); ?> <i
                                class="fa fa-arrow-circle-right"></i></a></div>
            </div>
            <div><img class="img-fluid pl-5 pt-1 pr-5" src="resources/images/sponsors-01.jpg"/></div>
            <div class="accepted-payment">
                <h3><?= T('Accepted Payment Methods'); ?></h3>
                <img src="resources/images/sponsors-02.jpg">
            </div>
            <div class="d-flex satisfaction-guaranteed">' +
                <div><img src="resources/images/satisfaction-guaranteed.jpg"/></div>
                <div><?= T('Our products are backed by a risk-free'); ?>
                    <em><?= T('30-day money-back'); ?></em><?= T('guarantee If you are not completely satisfied with your purchase'); ?>
                    <em><?= T('for ANY REASON'); ?></em>,<?= T('we will do'); ?>
                    <em><?= T('WHATEVER it takes'); ?></em>,<?= T('to make it right'); ?>
                </div>
            </div>
        </div>
    </div>
</script>
<?php if(isset($data->Lo_Site_Id)) {
    ?>
    }
    <script type='text/javascript'>
        window.__lo_site_id = <?php echo $data->Lo_Site_Id; ?>;

            (function () {
                var wa = document.createElement('script');
                wa.type = 'text/javascript';
                wa.async = true;
                wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wa, s);
            })();
    </script>
    <?php
}
?>
<script lang="template/html" type="template/html" id="WasTemplate">
    <div class="col-6 ">
        <?= T('Was'); ?>
    </div>
</script>
<script lang="template/html" type="template/html" id="TotalTemplate">
    <div class="col-6 ">
        <?= T('Total'); ?>
    </div>
</script>
<script lang="template/html" type="template/html" id="SavingTemplate">
    <div class="col-6 ">
        <?= T('Saving'); ?>
    </div>
</script>

<script lang="template/html" type="template/html" id="CartBottomTemplate">
    <div class="container cart-bottom">
        <div class="row">
            <div class="col-12 name">
                <div><a class="checkout-button" target="_top" href="/checkout.php"><?= T('Check Out'); ?> <i
                                class="fa fa-arrow-circle-right"></i></a></div>
            </div>
            <div><img class="img-fluid pl-5 pt-1 pr-5" src="resources/images/sponsors-01.jpg"/></div>
            <div class="accepted-payment">
                <h3><?= T('Accepted Payment Methods'); ?></h3>
                <img src="resources/images/sponsors-02.jpg">
            </div>
            <div class="d-flex satisfaction-guaranteed">' +
                <div><img src="resources/images/satisfaction-guaranteed.jpg"/></div>
                <div><?= T('Our products are backed by a risk-free'); ?>
                    <em><?= T('30-day money-back'); ?></em><?= T('guarantee If you are not completely satisfied with your purchase'); ?>
                    <em><?= T('for ANY REASON'); ?></em>, <?= T('we will do'); ?>
                    <em><?= T('WHATEVER it takes'); ?></em><?= T('to make it right'); ?>
                </div>
            </div>
        </div>
    </div>
</script>
<script lang="template/html" type="template/html" id="CartTempty">
    <div class="mt-3 mb-3"><?= T('Your cart is empty'); ?><br><?= T('Please add some items to proceed shopping'); ?>
    </div>
</script>
</body>
</html>










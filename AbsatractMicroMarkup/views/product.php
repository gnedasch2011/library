
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "sku": "<?php if ($product->quantity): ?>InStock<?php else: ?>OutOfStock<?php endif; ?>",
        "url": "<?php echo '/' . $product['url']['alias']; ?>",
        "category": "<?php echo $product['categoryNameResult']; ?>",
        "image": "<?php echo $fullPath = 'https://' . $_SERVER['HTTP_HOST'] . '/images/' . $product['image']['nodeType'] . '/' . $product->uri . '/' . $product['image']['fileName']; ?>",
        "brand": "<?php echo $product['brand']['name']; ?>",
        "productID": "isbn",
        "description": "<?= $description; ?>",
        "name": "<?php echo $product['nameMiddle']; ?>",
        <?php if($allReview)echo $allReview; ?>
        "offers": {
            "@type": "Offer",
            "availability": "http://schema.org/InStock",
            "price": "<?php echo $product['variant']['priceResult']; ?>",
            "url": "<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>",
            "priceCurrency": "RUB",
            "priceValidUntil": "<?php echo date("Y-m-d", strtotime("+1 month")); ?>"
        }
    }

<?php
// Database Connection
include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get Product by Slug URL
$slug = isset($_GET['slug']) ? $conn->real_escape_string($_GET['slug']) : '';

if(empty($slug)) {
    header("Location: products.php"); // Redirect if no slug
    exit;
}

$query = "SELECT p.*, c.categories as category_name FROM products p 
          LEFT JOIN categories c ON p.pro_cate = c.cate_id 
          WHERE p.slug_url = '$slug' AND p.status = 1";
$result = $conn->query($query);

if($result->num_rows == 0) {
    header("Location: products.php"); // Redirect if product not found
    exit;
}

$product = $result->fetch_assoc();
$pageTitle = htmlspecialchars($product['pro_name']); // Dynamic Page Title

include("include/header.php");
include("include/breadcrumb.php");

$main_img = !empty($product['pro_img']) ? 'admin/assets/img/uploads/'.$product['pro_img'] : 'images/project/placeholder.jpg';
?>

<!-- ================= Product Details Section ================= -->
<section class="product-details-section container">
    <div class="product-details-grid">

        <!-- Left: Dynamic Product Gallery -->
        <div class="product-gallery fade-up">
            <div class="main-image">
                <img src="<?= $main_img ?>" alt="<?= htmlspecialchars($product['pro_name']) ?>" id="current-image"
                    style="width:100%; height:400px; object-fit:contain; border:1px solid #eee;">
            </div>

            <div class="thumbnail-gallery" style="margin-top:15px; display:flex; gap:10px;">
                <!-- Main Image as Thumb -->
                <img src="<?= $main_img ?>" class="thumb active"
                    style="width:80px; height:80px; object-fit:cover; cursor:pointer; border:2px solid transparent;"
                    onclick="changeImage(this)">

                <?php
                // Fetch multiple product images from `product_images` table
                $img_query = "SELECT * FROM product_images WHERE product_id = " . $product['id'];
                $img_result = $conn->query($img_query);
                if($img_result->num_rows > 0) {
                    while($extra_img = $img_result->fetch_assoc()) {
                        $thumb_path = 'admin/uploads/gallery/'.$extra_img['image_path']; // Adjust path as per your folder structure
                ?>
                <img src="<?= $thumb_path ?>" class="thumb"
                    style="width:80px; height:80px; object-fit:cover; cursor:pointer; border:2px solid transparent;"
                    onclick="changeImage(this)">
                <?php } } ?>
            </div>
        </div>

        <!-- Right: Dynamic Product Info -->
        <div class="product-info-content fade-up delay-1">
            <span
                class="category-tag"><?= !empty($product['category_name']) ? htmlspecialchars($product['category_name']) : 'Auto Parts' ?></span>
            <h2><?= htmlspecialchars($product['pro_name']) ?></h2>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
                <span>(Highly Rated)</span>
            </div>

            <div class="short-desc" style="margin-top:20px; font-size:16px; color:#555;">
                <?= !empty($product['short_desc']) ? $product['short_desc'] : 'Premium quality automotive product designed for performance and durability.' ?>
            </div>

            <!-- Static features (Can be made dynamic later if needed) -->
            <ul class="product-features" style="margin-top:20px;">
                <li><i class="fa-solid fa-check" style="color:var(--primary-red);"></i> <strong>Brand:</strong>
                    <?= !empty($product['brand_name']) ? htmlspecialchars($product['brand_name']) : 'Mona Motors' ?>
                </li>
                <li><i class="fa-solid fa-check" style="color:var(--primary-red);"></i> <strong>Quality:</strong>
                    OEM-grade Replacement</li>
                <li><i class="fa-solid fa-check" style="color:var(--primary-red);"></i> <strong>Availability:</strong>
                    In Stock</li>
            </ul>

            <div class="action-buttons" style="margin-top:30px;">
                <a href="contact" class="btn-primary btn-large"><i class="fa-solid fa-envelope"></i> Get a Quote</a>
                <a href="https://wa.me/919408646667?text=I'm%20interested%20in%20<?= urlencode($product['pro_name']) ?>"
                    class="btn-whatsapp" target="_blank"
                    style="background:#25D366; color:#fff; padding:12px 25px; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block; margin-left:10px;"><i
                        class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
            </div>
        </div>
    </div>

    <!-- Dynamic Product Description Tabs -->
    <div class="product-tabs-section fade-up delay-2" style="margin-top:60px;">
        <div class="tabs-header">
            <button class="tab-btn active">Description</button>
            <button class="tab-btn">Specifications</button>
            <button class="tab-btn">Shipping & Return</button>
        </div>
        <div class="tabs-content" style="padding:30px; background:#f9f9f9; border-radius:8px;">
            <div id="tab-desc">
                <?= !empty($product['description']) ? $product['description'] : 'No detailed description available for this product.' ?>
            </div>
        </div>
    </div>
</section>

<!-- ================= Dynamic Related Products ================= -->
<section class="related-products container" style="margin-bottom:60px;">
    <div class="section-title text-center fade-up">
        <span class="sub-title">Similar Items</span>
        <h2>Related Products</h2>
    </div>

    <div class="shop-grid">
        <?php
        // Fetch 3 random related products from same category or overall
        $related_cat = $product['pro_cate'];
        $related_query = "SELECT p.*, c.categories as category_name FROM products p 
                          LEFT JOIN categories c ON p.pro_cate = c.cate_id 
                          WHERE p.status = 1 AND p.id != {$product['id']} AND p.pro_cate = '$related_cat' 
                          ORDER BY RAND() LIMIT 3";
        $related_result = $conn->query($related_query);
        
        // If not enough related products in same category, just fetch any
        if($related_result->num_rows < 3) {
            $related_query = "SELECT p.*, c.categories as category_name FROM products p 
                              LEFT JOIN categories c ON p.pro_cate = c.cate_id 
                              WHERE p.status = 1 AND p.id != {$product['id']} 
                              ORDER BY RAND() LIMIT 3";
            $related_result = $conn->query($related_query);
        }

        $r_delay = 0;
        if($related_result->num_rows > 0) {
            while($rel_product = $related_result->fetch_assoc()) {
                $rel_img = !empty($rel_product['pro_img']) ? 'admin/assets/img/uploads/'.$rel_product['pro_img'] : 'images/project/placeholder.jpg';
        ?>
        <div class="shop-card fade-up delay-<?= $r_delay ?>">
            <div class="shop-img-wrapper">
                <a href="product-details.php?slug=<?= $rel_product['slug_url'] ?>">
                    <img src="<?= $rel_img ?>" alt="<?= htmlspecialchars($rel_product['pro_name']) ?>"
                        style="width:100%; height:250px; object-fit:cover;">
                </a>
                <div class="shop-overlay">
                    <a href="product-details.php?slug=<?= $rel_product['slug_url'] ?>" class="btn-primary"><i
                            class="fa-solid fa-eye"></i> View Details</a>
                </div>
            </div>
            <div class="shop-info">
                <span
                    class="category-tag"><?= !empty($rel_product['category_name']) ? htmlspecialchars($rel_product['category_name']) : 'Auto Parts' ?></span>
                <h3><a
                        href="product-details.php?slug=<?= $rel_product['slug_url'] ?>"><?= htmlspecialchars($rel_product['pro_name']) ?></a>
                </h3>
                <p><?= strip_tags(substr($rel_product['short_desc'], 0, 60)) ?>...</p>
            </div>
        </div>
        <?php $r_delay++; } } ?>
    </div>
</section>

<!-- Script for Thumbnail Gallery & Tabs -->
<script>
// Image Switcher
function changeImage(element) {
    document.getElementById('current-image').src = element.src;
    let thumbs = document.querySelectorAll('.thumb');
    thumbs.forEach(thumb => {
        thumb.classList.remove('active');
        thumb.style.borderColor = "transparent";
    });
    element.classList.add('active');
    element.style.borderColor = "var(--primary-red)"; // Assuming you have this CSS variable
}
</script>

<?php 
$conn->close();
include("include/footer.php"); 
?>
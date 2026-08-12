<?php
$pageTitle = "Product details";
include("include/header.php");
include("include/breadcrumb.php");
?>

<!-- ================= Product Details Section ================= -->
<section class="product-details-section container">
    <div class="product-details-grid">

        <!-- Left: Product Gallery -->
        <div class="product-gallery fade-up">
            <div class="main-image">
                <img src="images/project/p1.jpg" alt="Power Window Switch" id="current-image">
            </div>
            <!-- Optional Thumbnails for premium look -->
            <div class="thumbnail-gallery">
                <img src="images/project/p1.jpg" class="thumb active" alt="Thumb 1" onclick="changeImage(this)">
                <img src="images/project/p2.jpg" class="thumb" alt="Thumb 2" onclick="changeImage(this)">
                <img src="images/project/p3.jpg" class="thumb" alt="Thumb 3" onclick="changeImage(this)">
            </div>
        </div>

        <!-- Right: Product Info -->
        <div class="product-info-content fade-up delay-1">
            <span class="category-tag">Auto Electrical</span>
            <h2>Power Window Switch</h2>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
                <span>(15 Customer Reviews)</span>
            </div>

            <p class="short-desc">
                Upgrade your vehicle's interior functionality with our premium Power Window Switch. Engineered for durability and smooth operation, this OEM-grade replacement ensures long-lasting performance.
            </p>

            <ul class="product-features">
                <li><i class="fa-solid fa-check"></i> <strong>Material:</strong> High-grade ABS Plastic</li>
                <li><i class="fa-solid fa-check"></i> <strong>Compatibility:</strong> Universal fit for multiple models</li>
                <li><i class="fa-solid fa-check"></i> <strong>Warranty:</strong> 6 Months Replacement Guarantee</li>
                <li><i class="fa-solid fa-check"></i> <strong>Installation:</strong> Easy plug-and-play setup</li>
            </ul>

            <div class="action-buttons">
                <a href="contact.php" class="btn-primary btn-large"><i class="fa-solid fa-envelope"></i> Get a Quote</a>
                <a href="https://wa.me/919408646667" class="btn-whatsapp" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
            </div>

            <div class="contact-support">
                <p>Need help finding the right part? <br> Call us at <strong>+91 94086 46667</strong></p>
            </div>
        </div>
    </div>

    <!-- Product Description Tabs -->
    <div class="product-tabs-section fade-up delay-2">
        <div class="tabs-header">
            <button class="tab-btn active">Description</button>
            <button class="tab-btn">Specifications</button>
            <button class="tab-btn">Shipping & Return</button>
        </div>
        <div class="tabs-content">
            <p>The power window switch is a crucial component of your car's electrical system, allowing you to effortlessly control the windows. Our switches are manufactured to meet or exceed OEM specifications, ensuring reliable performance in all weather conditions. The tactile feedback and responsive buttons provide a premium feel, making it an ideal replacement for worn-out or malfunctioning switches.</p>
        </div>
    </div>
</section>

<!-- ================= Related Products Section ================= -->
<section class="related-products container">
    <div class="section-title text-center fade-up">
        <span class="sub-title">Similar Items</span>
        <h2>Related Products</h2>
    </div>

    <div class="shop-grid">
        <!-- Product 2 -->
        <div class="shop-card fade-up">
            <div class="shop-img-wrapper">
                <img src="images/project/p2.jpg" alt="AC Vent Innova">
                <div class="shop-overlay">
                    <a href="product-details.php" class="btn-primary"><i class="fa-solid fa-eye"></i> View Details</a>
                </div>
            </div>
            <div class="shop-info">
                <span class="category-tag">Interior</span>
                <h3><a href="product-details.php">AC Vent Innova</a></h3>
                <p>High-quality AC vents for perfect airflow and premium finish.</p>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="shop-card fade-up delay-1">
            <div class="shop-img-wrapper">
                <img src="images/project/p4.jpg" alt="AC Flap Motor">
                <div class="shop-overlay">
                    <a href="product-details.php" class="btn-primary"><i class="fa-solid fa-eye"></i> View Details</a>
                </div>
            </div>
            <div class="shop-info">
                <span class="category-tag">Electrical</span>
                <h3><a href="product-details.php">AC Flap Motor</a></h3>
                <p>Reliable AC flap motors designed for efficient cooling control.</p>
            </div>
        </div>

        <!-- Product 6 -->
        <div class="shop-card fade-up delay-2">
            <div class="shop-img-wrapper">
                <img src="images/project/p6.jpg" alt="Blower Motor">
                <div class="shop-overlay">
                    <a href="product-details.php" class="btn-primary"><i class="fa-solid fa-eye"></i> View Details</a>
                </div>
            </div>
            <div class="shop-info">
                <span class="category-tag">Mechanical</span>
                <h3><a href="product-details.php">Blower Motor</a></h3>
                <p>High-performance blower motors designed for efficient airflow.</p>
            </div>
        </div>
    </div>
</section>

<!-- Script for Thumbnail Gallery -->
<script>
    function changeImage(element) {
        document.getElementById('current-image').src = element.src;
        let thumbs = document.querySelectorAll('.thumb');
        thumbs.forEach(thumb => thumb.classList.remove('active'));
        element.classList.add('active');
    }
</script>


<?php include("include/footer.php"); ?>
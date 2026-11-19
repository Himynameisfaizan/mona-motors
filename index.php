<?php 
include 'include/header.php'; 

include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- ================= Dynamic Hero Section ================= -->
<?php
$banner_query = "SELECT * FROM banners WHERE status = 0 ORDER BY display_order ASC LIMIT 1";
$banner_result = $conn->query($banner_query);
$banner = $banner_result->fetch_assoc();
$banner_bg = !empty($banner['banner_path']) ? $banner['banner_path'] : 'images/slider/slider-1.jpg';
?>

<section class="hero-section" style="background-image: url('admin/<?= $banner_bg ?>');">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <span class="badge fade-up">All Types of Car Spare Parts Stockiest</span>
        <h1 class="fade-up delay-1">
            <?= !empty($banner['title']) ? html_entity_decode($banner['title']) : 'Premium Auto <br><span class="text-red">Motor Parts</span>' ?>
        </h1>
        <p class="fade-up delay-2" style="max-width: 560px; line-height: 1.6;">
            <?= !empty($banner['description']) ? html_entity_decode($banner['description']) : 'Specializing in high-performance spare parts, AC compressors, and reliable automotive solutions designed for durability and efficiency.' ?>
        </p>
        <div class="hero-btns fade-up delay-3">
            <a href="contact" class="btn-primary btn-large">Contact Now</a>
            <a href="products" class="btn-secondary btn-large">Explore Parts</a>
        </div>
    </div>
</section>

<!-- ================= Services Quick Snippet ================= -->
<section class="features-section container">
    <div class="feature-card">
        <div class="icon"><img src="images/icon/icon-card/v-1/icon-1.png" alt="Auto Electrical"></div>
        <h3>Auto Electrical</h3>
        <p>High-quality switches, sensors, and electrical components for smooth performance.</p>
    </div>
    <div class="feature-card feature-active">
        <div class="icon"><i class="fa-solid fa-fan" style="font-size: 40px; color: var(--primary-red);"></i></div>
        <h3>Interior Parts</h3>
        <p>Premium AC vents, wiper linkages, and blower motors designed for perfect fit.</p>
    </div>
    <div class="feature-card">
        <div class="icon"><img src="images/icon/icon-card/v-1/icon-2.png" alt="Spare Solutions"></div>
        <h3>Spare Solutions</h3>
        <p>Durable engine and mechanical components for a wide range of vehicle models.</p>
    </div>
</section>

<!-- ================= Dynamic About Section ================= -->
<?php
$about_query = "SELECT * FROM about_sections ORDER BY section_order ASC LIMIT 1";
$about_result = $conn->query($about_query);
$about = $about_result->fetch_assoc();
?>
<section class="about-section container" style="margin-top: 60px;">
    <div class="about-grid">
        <div class="about-image-wrapper fade-up">
            <img src="admin/<?= !empty($about['image_url']) ? $about['image_url'] : 'images/section-bg/about-sec-bg.jpg' ?>"
                alt="About Mona Motors" class="about-main-img">
            <div class="experience-badge">
                <h3 class="years">15+</h3>
                <span class="text">Years of<br>Trust</span>
            </div>
        </div>
        <div class="about-content fade-up delay-1">
            <span class="sub-title">About Us</span>
            <h2><?= !empty($about['title']) ? htmlspecialchars($about['title']) : 'Trusted Auto Parts For Every Vehicle' ?>
            </h2>
            <div class="about-desc">
                <?= !empty($about['content']) ? $about['content'] : '<p>Mona Moters is a trusted supplier of premium-quality automobile spare parts.</p>' ?>
            </div>
            <ul class="about-features" style="margin-top: 20px;">
                <li><i class="fa-solid fa-circle-check"></i> <strong>100% Genuine Quality:</strong> Rigorously tested
                    auto parts.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Vast Inventory:</strong> Covering multiple vehicle
                    brands.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Client Satisfaction:</strong> Prioritizing dealer &
                    owner needs.</li>
            </ul>
            <a href="about" class="btn-primary mt-4">Discover More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ================= Dynamic Featured Products ================= -->
<section class="products-section container">
    <div class="section-title">
        <span class="sub-title">Inventory</span>
        <h2>Featured Products</h2>
        <p class="section-desc">Explore our top-selling, premium-quality automotive parts.</p>
    </div>

    <div class="products-grid">
        <?php
        $product_query = "SELECT * FROM products WHERE status = 1 LIMIT 3";
        $product_result = $conn->query($product_query);
        if($product_result->num_rows > 0) {
            while($product = $product_result->fetch_assoc()) {
                $img_path = !empty($product['pro_img']) ? 'admin/assets/img/uploads/'.$product['pro_img'] : 'images/project/placeholder.jpg';
        ?>
        <div class="product-card">
            <div class="product-img">
                <img src="<?= $img_path ?>" alt="<?= htmlspecialchars($product['pro_name']) ?>"
                    style="width:100%; height:250px; object-fit:cover;">
            </div>
            <div class="product-info">
                <h3><?= htmlspecialchars($product['pro_name']) ?></h3>
                <!-- Stripping HTML tags from short_desc for clean layout -->
                <p><?= strip_tags(substr($product['short_desc'], 0, 80)) ?>...</p>
                <a href="product/<?= $product['slug_url'] ?>" class="read-more"><i
                        class="fa-solid fa-arrow-right-long"></i> Read More</a>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div class="text-center" style="margin-top: 40px;">
        <a href="products" class="btn-primary">View All Products <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</section>

<!-- ================= [NEW STATIC] Trust Section 2: Quality Guarantee Banner ================= -->
<section class="guarantee-section"
    style="background: linear-gradient(135deg, #111 0%, #2a2a2a 100%); color: #fff; padding: 50px 0; margin-top: 60px;">
    <div class="container"
        style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
        <div class="guarantee-content" style="max-width: 600px;">
            <h2 style="color: #fff; margin-bottom: 15px;"><i class="fa-solid fa-award"
                    style="color: #e3000f; margin-right: 10px;"></i> 100% Quality Guarantee</h2>
            <p style="color: #ccc; font-size: 16px; line-height: 1.6;">We stand behind every part we sell. If an item
                doesn't meet our rigorous performance tests or fails to fit correctly due to manufacturing defects, we
                offer a hassle-free replacement. Your trust is our biggest asset.</p>
        </div>
        <div class="guarantee-action">
            <img src="images/brand-logo/iso-certified.png" alt="Certified Quality"
                style="max-height: 100px; opacity: 0.8;" onerror="this.style.display='none'">
            <a href="contact" class="btn-primary" style="margin-left: 20px; padding: 15px 30px;">Speak to an Expert</a>
        </div>
    </div>
</section>
<!-- ================= Dynamic Gallery Section ================= -->
<!-- Fancybox v4 CSS -->

<section class="gallery-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Our Showcase</span>
            <h2>Product Gallery</h2>
            <p class="section-desc">Explore our wide range of premium-quality automotive parts.</p>
        </div>

        <div class="gallery-grid">
            <?php
            $gallery_query = "SELECT * FROM gallery ORDER BY ID DESC LIMIT 6";
            $gallery_result = $conn->query($gallery_query);
            $delay = 0;
            if($gallery_result->num_rows > 0) {
                while($gallery = $gallery_result->fetch_assoc()) {
            ?>
            <div class="gallery-item fade-up delay-<?= $delay ?>">
                <!-- Website mein dikhne wali image -->
                <img src="admin/<?= $gallery['image_path'] ?>" alt="<?= htmlspecialchars($gallery['image_name']) ?>">

                <div class="gallery-overlay">
                    <!-- Popup Trigger (data-type="image" added) -->
                    <a href="admin/<?= $gallery['image_path'] ?>" data-fancybox="gallery" data-type="image"
                        data-caption="<?= htmlspecialchars($gallery['image_name']) ?>" class="zoom-btn">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </a>
                </div>
            </div>
            <?php 
                $delay++; 
                if($delay > 2) $delay = 0; 
                } 
            } 
            ?>
        </div>
    </div>
</section>

<!-- ================= Dynamic Testimonials Section ================= -->
<section class="testimonial-section container">
    <div class="section-title text-center">
        <span class="sub-title">Client Reviews</span>
        <h2>Performance That Speaks</h2>
    </div>

    <div class="testimonial-grid">
        <?php
        $testi_query = "SELECT * FROM testimonials WHERE status = 1 ORDER BY test_id DESC LIMIT 2";
        $testi_result = $conn->query($testi_query);
        $t_delay = 0;
        if($testi_result->num_rows > 0) {
            while($testi = $testi_result->fetch_assoc()) {
        ?>
        <div class="testi-card fade-up delay-<?= $t_delay ?>">
            <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
            <div class="stars">
                <?php 
                $rating = !empty($testi['rating']) ? $testi['rating'] : 5;
                for($i=1; $i<=$rating; $i++) { echo '<i class="fa-solid fa-star"></i>'; }
                ?>
            </div>
            <p>"<?= htmlspecialchars($testi['message']) ?>"</p>
            <div class="client-meta">
                <?php if(!empty($testi['image'])) { ?>
                <img src="admin/uploads/testimonials/<?= $testi['image'] ?>"
                    alt="<?= htmlspecialchars($testi['name']) ?>"
                    onerror="this.src='images/testimonial/placeholder.jpg'">
                <?php } else { ?>
                <img src="images/testimonial/placeholder.jpg" alt="Client">
                <?php } ?>
                <div class="client-info">
                    <h4><?= htmlspecialchars($testi['name']) ?></h4>
                    <span><?= htmlspecialchars($testi['designation']) ?></span>
                </div>
            </div>
        </div>
        <?php $t_delay++; } } ?>
    </div>
</section>

<!-- ================= [NEW DYNAMIC] Blogs Section ================= -->
<section class="blog-section" style="background-color: #fcfcfc; padding: 80px 0;">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Latest News</span>
            <h2>Automotive Insights & Tips</h2>
            <p class="section-desc">Stay updated with the latest trends and maintenance guides.</p>
        </div>

        <div class="row" style="display: flex; gap: 30px; flex-wrap: wrap;">
            <?php
            $blog_query = "SELECT * FROM blogs WHERE status = 1 ORDER BY blog_id DESC LIMIT 3";
            $blog_result = $conn->query($blog_query);
            if($blog_result->num_rows > 0) {
                while($blog = $blog_result->fetch_assoc()) {
            ?>
            <div class="col"
                style="flex: 1; min-width: 300px; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <img src="admin/assets/img/uploads/blogs/<?= $blog['image'] ?>"
                    alt="<?= htmlspecialchars($blog['title']) ?>" style="width: 100%; height: 200px; object-fit: cover;"
                    onerror="this.src='images/project/placeholder.jpg'">
                <div class="blog-content" style="padding: 20px;">
                    <span
                        style="color: var(--primary-red); font-size: 14px; font-weight: bold;"><?= date('d M, Y', strtotime($blog['created_at'])) ?></span>
                    <h3 style="margin: 10px 0; font-size: 20px;"><?= htmlspecialchars($blog['title']) ?></h3>
                    <p style="color: #666; font-size: 15px; margin-bottom: 15px;">
                        <?= strip_tags(substr($blog['description'], 0, 100)) ?>...</p>
                    <a href="blog/<?= $blog['slug'] ?>"
                        style="color: #111; font-weight: 600; text-decoration: none;">Read Article <i
                            class="fa-solid fa-arrow-right-long" style="color: var(--primary-red);"></i></a>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>

<!-- ================= [NEW STATIC] Trust Section 1: Why Choose Us ================= -->
<section class="trust-section" style="background-color: #f9f9f9; padding: 60px 0; margin-top: 40px;">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Why Choose Mona Motors</span>
            <h2>Setting the Standard in Auto Parts</h2>
        </div>
        <div class="row" style="display: flex; gap: 30px; text-align: center; margin-top: 30px;">
            <div class="col"
                style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-shield-halved" style="font-size: 40px; color: #e3000f; margin-bottom: 15px;"></i>
                <h4>OEM Standard Quality</h4>
                <p>Every part we supply meets or exceeds strict Original Equipment Manufacturer standards for ultimate
                    safety.</p>
            </div>
            <div class="col"
                style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-truck-fast" style="font-size: 40px; color: #e3000f; margin-bottom: 15px;"></i>
                <h4>Express Dispatch</h4>
                <p>We understand that a broken car means lost time. Our streamlined inventory ensures same-day dispatch
                    on most orders.</p>
            </div>
            <div class="col"
                style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-headset" style="font-size: 40px; color: #e3000f; margin-bottom: 15px;"></i>
                <h4>Expert Support</h4>
                <p>Not sure which part fits? Our experienced mechanics and parts specialists are here to guide you
                    directly.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= Client Logos (Marquee effect) ================= -->
<section class="brand-section">
    <div class="container">
        <div class="brand-track">
            <?php
            $brand_query = "SELECT * FROM brands ORDER BY id DESC LIMIT 6";
            $brand_result = $conn->query($brand_query);
            if($brand_result->num_rows > 0) {
                while($brand = $brand_result->fetch_assoc()) {
                    echo '<img src="'.'admin/'. $brand['logo_path'].'" alt="'.htmlspecialchars($brand['brand_name']).'">';
                }
            } else {
            ?>
            <img src="images/brand-logo/v-2/client-1.png" alt="Brand 1">
            <img src="images/brand-logo/v-2/client-2.png" alt="Brand 2">
            <img src="images/brand-logo/v-2/client-3.png" alt="Brand 3">
            <img src="images/brand-logo/v-2/client-4.png" alt="Brand 4">
            <img src="images/brand-logo/v-2/client-5.png" alt="Brand 5">
            <?php } ?>
        </div>
    </div>
</section>

<!-- ================= [NEW STATIC] Trust Section 3: Secure Shopping Strip ================= -->
<section class="trust-strip" style="background-color: var(--primary-red, #e3000f); color: #fff; padding: 20px 0;">
    <div class="container"
        style="display: flex; justify-content: space-around; flex-wrap: wrap; text-align: center; gap: 15px;">
        <div><i class="fa-solid fa-lock"></i> Secure Payments 256-bit SSL</div>
        <div><i class="fa-solid fa-box-open"></i> Damage-Free Packaging</div>
        <div><i class="fa-solid fa-arrow-rotate-left"></i> Easy Returns within 7 Days</div>
    </div>
</section>

<!-- ================= Newsletter Section ================= -->
<section class="newsletter-section">
    <div class="container newsletter-inner">
        <div class="newsletter-content">
            <h2>Stay Updated with Mona Motors</h2>
            <p>Subscribe to our newsletter for the latest updates on new auto parts and exclusive deals.</p>
        </div>
        <div class="newsletter-form-wrapper">
            <form action="subscribe.php" method="POST" class="newsletter-form">
                <input type="email" name="email" placeholder="Enter your email address..." required>
                <button type="submit" class="btn-primary">Subscribe <i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</section>

<!-- Fancybox v4 JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
Fancybox.bind('[data-fancybox="gallery"]', {
    Toolbar: {
        display: [
            "zoom",
            "slideShow",
            "fullscreen",
            "close",
        ],
    },
    Images: {
        initialSize: "fit"
    }
});
</script>

<?php 
$conn->close();
include 'include/footer.php'; 
?>
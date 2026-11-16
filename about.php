<?php 
$pageTitle = "About Us";
include ("include/header.php");
include ("include/breadcrumb.php"); 

// Database Connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mona_motors"; // Database Name
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch About Us Data from Database
$about_query = "SELECT * FROM about_us LIMIT 1";
$about_result = $conn->query($about_query);
$about_data = $about_result->fetch_assoc();
?>
<!-- ================= About Company Details ================= -->
<section class="about-page-main container">
    <div class="about-grid">
        <!-- Left Side: Dynamic Image -->
        <div class="about-image-wrapper fade-up">
            <?php 
                    // Set default image if database image is empty
                    $about_img = !empty($about_data['image_url']) ? "admin/uploads/".$about_data['image_url'] : "images/section-bg/about-sec-bg.jpg"; 
                ?>
            <img src="<?= $about_img ?>" alt="Mona Motors Office" class="about-main-img"
                style="width:100%; height:100%; object-fit:cover;">
            <div class="experience-badge">
                <h3 class="years">15+</h3>
                <span class="text">Years of<br>Excellence</span>
            </div>
        </div>

        <!-- Right Side: Dynamic Content -->
        <div class="about-content fade-up delay-1">
            <span class="sub-title">Who We Are</span>
            <h2><?= !empty($about_data['title']) ? htmlspecialchars($about_data['title']) : 'Your Trusted Partner in Premium Auto Parts' ?>
            </h2>

            <div class="about-dynamic-text">
                <!-- Echoing raw content since it contains HTML tags (p, ul, li) from text editor -->
                <?= !empty($about_data['content']) ? $about_data['content'] : '<p>Welcome to <strong>Mona Motors</strong>, your premier destination for high-quality automobile spare parts. Based in the heart of Mumbai at Lamington Road, we have built a legacy of trust and reliability over the years.</p>' ?>
            </div>

            <!-- Static Highlight Features for trust building -->
            <div class="about-highlights" style="margin-top: 30px;">
                <div class="highlight-item">
                    <i class="fa-solid fa-cogs"></i>
                    <div>
                        <h4>Genuine Parts</h4>
                        <p>100% authentic and tested products.</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fa-solid fa-handshake"></i>
                    <div>
                        <h4>Trusted Support</h4>
                        <p>Dedicated team for all your queries.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= Mission & Vision Section (Static) ================= -->
<section class="mission-vision-section">
    <div class="container">
        <div class="mv-grid">
            <!-- Mission Card -->
            <div class="mv-card fade-up">
                <div class="icon-box"><i class="fa-solid fa-bullseye"></i></div>
                <h3>Our Mission</h3>
                <p>To provide top-tier automotive spare parts at competitive prices, ensuring that every mechanic,
                    dealer, and vehicle owner gets the best performance and reliability for their vehicles.</p>
            </div>

            <!-- Vision Card -->
            <div class="mv-card fade-up delay-1">
                <div class="icon-box"><i class="fa-solid fa-eye"></i></div>
                <h3>Our Vision</h3>
                <p>To become India's most trusted and widespread stockist for car spare parts, driven by innovation,
                    quality assurance, and uncompromised customer satisfaction.</p>
            </div>

            <!-- Core Values Card -->
            <div class="mv-card fade-up delay-2">
                <div class="icon-box"><i class="fa-solid fa-gem"></i></div>
                <h3>Core Values</h3>
                <p>Integrity, Quality, and Customer-First approach. We believe in building long-term relationships with
                    our clients through transparent deals and authentic products.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= Counters Section ================= -->
<section class="counter-section" style="background-image: url('images/section-bg/footer-bg-one.jpg');">
    <div class="counter-overlay"></div>
    <div class="container counter-grid">
        <div class="counter-item fade-up">
            <i class="fa-solid fa-car-side"></i>
            <h3 class="counter-number">5000<span>+</span></h3>
            <p>Auto Parts Available</p>
        </div>
        <div class="counter-item fade-up delay-1">
            <i class="fa-solid fa-face-smile"></i>
            <h3 class="counter-number">1200<span>+</span></h3>
            <p>Happy Clients</p>
        </div>
        <div class="counter-item fade-up delay-2">
            <i class="fa-solid fa-building"></i>
            <h3 class="counter-number">15<span>+</span></h3>
            <p>Years in Business</p>
        </div>
        <div class="counter-item fade-up delay-3">
            <i class="fa-solid fa-award"></i>
            <h3 class="counter-number">100<span>%</span></h3>
            <p>Quality Guarantee</p>
        </div>
    </div>
</section>

<?php 
$conn->close();
include("include/footer.php"); 
?>
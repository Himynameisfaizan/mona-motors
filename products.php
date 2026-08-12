<?php 
$pageTitle = "Our Products"; 

include 'include/header.php'; 
include 'include/breadcrumb.php'; 
?>

    <!-- ================= Main Products Section ================= -->
    <section class="shop-section container">
        
        <!-- Category Filter Bar (Visual Design) -->
        <div class="product-filters fade-up">
            <button class="filter-btn active" data-filter="all">All Parts</button>
            <button class="filter-btn" data-filter="electrical">Electrical</button>
            <button class="filter-btn" data-filter="interior">Interior</button>
            <button class="filter-btn" data-filter="engine">Mechanical</button>
        </div>

        <!-- Products Grid -->
        <div class="shop-grid">
            <!-- Product 1 -->
            <div class="shop-card fade-up">
                <div class="shop-img-wrapper">
                    <img src="images/project/p1.jpg" alt="Power Window Switch">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Electrical</span>
                    <h3><a href="#">Power Window Switch</a></h3>
                    <p>Premium quality switches designed for smooth control and durability.</p>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="shop-card fade-up delay-1">
                <div class="shop-img-wrapper">
                    <img src="images/project/p2.jpg" alt="AC Vent Innova">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Interior</span>
                    <h3><a href="#">AC Vent Innova</a></h3>
                    <p>High-quality AC vents for perfect airflow and premium finish.</p>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="shop-card fade-up delay-2">
                <div class="shop-img-wrapper">
                    <img src="images/project/p3.jpg" alt="Wiper Linkage Figo">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Mechanical</span>
                    <h3><a href="#">Wiper Linkage Figo</a></h3>
                    <p>Durable wiper linkage for smooth wiping and reliability.</p>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="shop-card fade-up">
                <div class="shop-img-wrapper">
                    <img src="images/project/p4.jpg" alt="AC Flap Motor">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Electrical</span>
                    <h3><a href="#">AC Flap Motor</a></h3>
                    <p>Reliable AC flap motors designed for efficient cooling control.</p>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="shop-card fade-up delay-1">
                <div class="shop-img-wrapper">
                    <img src="images/project/p5.jpg" alt="AC Vent Polo Vento">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Interior</span>
                    <h3><a href="#">AC Vent Polo Vento</a></h3>
                    <p>Premium AC vents designed for smooth airflow and perfect fitting.</p>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="shop-card fade-up delay-2">
                <div class="shop-img-wrapper">
                    <img src="images/project/p6.jpg" alt="Blower Motor">
                    <div class="shop-overlay">
                        <a href="contact.php" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                    </div>
                </div>
                <div class="shop-info">
                    <span class="category-tag">Mechanical</span>
                    <h3><a href="#">Blower Motor</a></h3>
                    <p>High-performance blower motors designed for efficient airflow.</p>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper fade-up">
            <ul class="pagination">
                <li><a href="#" class="prev"><i class="fa-solid fa-angle-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#" class="next"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </div>

    </section>

<?php include 'include/footer.php'; ?>
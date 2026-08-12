<?php
$pageTitle = "Blogs";
include("include/header.php");
include("include/breadcrumb.php");
?>

    <!-- ================= Blog Grid Section ================= -->
    <section class="blog-section container">
        <div class="section-title text-center fade-up">
            <span class="sub-title">Our Updates</span>
            <h2>Automotive Insights & Tips</h2>
            <p class="section-desc">Stay updated with the latest news, maintenance tips, and product highlights from Mona Motors.</p>
        </div>

        <div class="blog-grid">
            <!-- Blog Post 1 -->
            <div class="blog-card fade-up">
                <div class="blog-img-wrapper">
                    <img src="images/project/p1.jpg" alt="Blog 1">
                    <div class="blog-date">
                        <span class="day">15</span>
                        <span class="month">Oct</span>
                    </div>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span><i class="fa-solid fa-user"></i> Admin</span>
                        <span><i class="fa-solid fa-folder-open"></i> Maintenance</span>
                    </div>
                    <h3><a href="blog-details.php">Top 5 Signs You Need to Replace Your Power Window Switch</a></h3>
                    <p>Struggling with a stuck window? Learn the early warning signs of a failing power window switch and how to fix it.</p>
                    <a href="blog-details.php" class="read-more-btn">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="blog-card fade-up delay-1">
                <div class="blog-img-wrapper">
                    <img src="images/project/p4.jpg" alt="Blog 2">
                    <div class="blog-date">
                        <span class="day">28</span>
                        <span class="month">Sep</span>
                    </div>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span><i class="fa-solid fa-user"></i> Admin</span>
                        <span><i class="fa-solid fa-folder-open"></i> Air Conditioning</span>
                    </div>
                    <h3><a href="blog-details.php">How to Keep Your Car's AC Flap Motor Running Smoothly</a></h3>
                    <p>Maintain perfect cabin temperature by understanding how your AC flap motor works and how to prevent it from jamming.</p>
                    <a href="blog-details.php" class="read-more-btn">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="blog-card fade-up delay-2">
                <div class="blog-img-wrapper">
                    <img src="images/project/p6.jpg" alt="Blog 3">
                    <div class="blog-date">
                        <span class="day">10</span>
                        <span class="month">Sep</span>
                    </div>
                </div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span><i class="fa-solid fa-user"></i> Admin</span>
                        <span><i class="fa-solid fa-folder-open"></i> Engine Parts</span>
                    </div>
                    <h3><a href="blog-details.php">Why Upgrading Your Blower Motor is Crucial for Summer</a></h3>
                    <p>A weak blower motor can ruin your driving experience. Discover why upgrading to a premium motor is a smart choice.</p>
                    <a href="blog-details.php" class="read-more-btn">Read Article <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper fade-up">
            <ul class="pagination">
                <li><a href="#" class="prev"><i class="fa-solid fa-angle-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#" class="next"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </div>
    </section>


<?php include ("include/footer.php"); ?>
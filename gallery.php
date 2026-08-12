<?php
$pageTitle = "Gallery";
include("include/header.php");
include("include/breadcrumb.php");
?>
<!-- ================= Gallery Page Section ================= -->
<section class="gallery-page-section container">
    <div class="section-title text-center fade-up">
        <span class="sub-title">Visual Showcase</span>
        <h2>Premium Automotive Parts</h2>
        <p class="section-desc">Take a look at our extensive inventory of genuine spare parts, AC compressors, and electrical components.</p>
    </div>

    <div class="gallery-page-grid">
        <!-- Gallery Item 1 -->
        <div class="gallery-item fade-up">
            <img src="images/project/p1.jpg" alt="Gallery Image 1">
            <div class="gallery-overlay">
                <a href="images/project/p1.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
        <!-- Gallery Item 2 -->
        <div class="gallery-item fade-up delay-1">
            <img src="images/project/p2.jpg" alt="Gallery Image 2">
            <div class="gallery-overlay">
                <a href="images/project/p2.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
        <!-- Gallery Item 3 -->
        <div class="gallery-item fade-up delay-2">
            <img src="images/project/p3.jpg" alt="Gallery Image 3">
            <div class="gallery-overlay">
                <a href="images/project/p3.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
        <!-- Gallery Item 4 -->
        <div class="gallery-item fade-up">
            <img src="images/project/p4.jpg" alt="Gallery Image 4">
            <div class="gallery-overlay">
                <a href="images/project/p4.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
        <!-- Gallery Item 5 -->
        <div class="gallery-item fade-up delay-1">
            <img src="images/project/p5.jpg" alt="Gallery Image 5">
            <div class="gallery-overlay">
                <a href="images/project/p5.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
        <!-- Gallery Item 6 -->
        <div class="gallery-item fade-up delay-2">
            <img src="images/project/p6.jpg" alt="Gallery Image 6">
            <div class="gallery-overlay">
                <a href="images/project/p6.jpg" class="zoom-btn" target="_blank"><i class="fa-solid fa-expand"></i></a>
            </div>
        </div>
    </div>

    <!-- Pagination for Gallery -->
    <div class="pagination-wrapper fade-up">
        <ul class="pagination">
            <li><a href="#" class="prev"><i class="fa-solid fa-angle-left"></i></a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#" class="next"><i class="fa-solid fa-angle-right"></i></a></li>
        </ul>
    </div>
</section>

<?php include("include/footer.php") ?>
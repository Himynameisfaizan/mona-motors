<?php
$pageTitle = "Gallery";
include("include/header.php");
include("include/breadcrumb.php");

// Database Connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mona_motors"; 
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination Logic
$limit = 6; // Ek page par kitni images dikhani hain
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$total_query = "SELECT COUNT(ID) as total FROM gallery";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);
?>

<!-- Fancybox v4 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<style>
/* Popup Background Blur Effect */
.fancybox__backdrop {
    background: rgba(0, 0, 0, 0.7) !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
}

/* Force Main Image to be visible */
.fancybox__image {
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: contain !important;
    opacity: 1 !important;
    visibility: visible !important;
    transform: none !important;
    animation: none !important;
}
</style>

<!-- ================= Gallery Page Section ================= -->
<section class="gallery-page-section container">
    <div class="section-title text-center fade-up">
        <span class="sub-title">Visual Showcase</span>
        <h2>Premium Automotive Parts</h2>
        <p class="section-desc">Take a look at our extensive inventory of genuine spare parts, AC compressors, and
            electrical components.</p>
    </div>

    <div class="gallery-page-grid">
        <?php
        $gallery_query = "SELECT * FROM gallery ORDER BY ID DESC LIMIT $limit OFFSET $offset";
        $gallery_result = $conn->query($gallery_query);
        $delay = 0;
        
        if($gallery_result->num_rows > 0) {
            while($gallery = $gallery_result->fetch_assoc()) {
        ?>
        <div class="gallery-item fade-up delay-<?= $delay ?>">
            <img src="admin/<?= $gallery['image_path'] ?>" alt="<?= htmlspecialchars($gallery['image_name']) ?>">
            <div class="gallery-overlay">
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
        } else {
            echo "<p class='text-center w-100'>No images found in the gallery.</p>";
        }
        ?>
    </div>

    <!-- Dynamic Pagination -->
    <?php if($total_pages > 1) { ?>
    <div class="pagination-wrapper fade-up">
        <ul class="pagination">
            <?php if($page > 1) { ?>
            <li><a href="?page=<?= $page - 1 ?>" class="prev"><i class="fa-solid fa-angle-left"></i></a></li>
            <?php } ?>

            <?php for($i = 1; $i <= $total_pages; $i++) { ?>
            <li><a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a></li>
            <?php } ?>

            <?php if($page < $total_pages) { ?>
            <li><a href="?page=<?= $page + 1 ?>" class="next"><i class="fa-solid fa-angle-right"></i></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
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
include("include/footer.php"); 
?>
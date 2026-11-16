<?php
$pageTitle = "Blogs";
include("include/header.php");
include("include/breadcrumb.php");

include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination Logic
$limit = 6; // Number of blogs per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total blogs count for pagination
$total_query = "SELECT COUNT(blog_id) as total FROM blogs WHERE status = 1";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);
?>

<!-- ================= Blog Grid Section ================= -->
<section class="blog-section container">
    <div class="section-title text-center fade-up">
        <span class="sub-title">Our Updates</span>
        <h2>Automotive Insights & Tips</h2>
        <p class="section-desc">Stay updated with the latest news, maintenance tips, and product highlights from Mona
            Motors.</p>
    </div>

    <div class="blog-grid">
        <?php
            // Fetch Blogs
            $blog_query = "SELECT * FROM blogs WHERE status = 1 ORDER BY blog_id DESC LIMIT $limit OFFSET $offset";
            $blog_result = $conn->query($blog_query);
            $delay = 0;

            if($blog_result->num_rows > 0) {
                while($blog = $blog_result->fetch_assoc()) {
                    $img_path = !empty($blog['image']) ? 'admin/assets/img/uploads/blogs/'.$blog['image'] : 'images/project/placeholder.jpg';
                    $blog_date = strtotime($blog['created_at']);
            ?>
        <div class="blog-card fade-up delay-<?= $delay ?>">
            <div class="blog-img-wrapper">
                <!-- URL with Slug -->
                <a href="blog-details.php?slug=<?= $blog['slug'] ?>">
                    <img src="<?= $img_path ?>" alt="<?= htmlspecialchars($blog['title']) ?>"
                        style="width:100%; height:250px; object-fit:cover;">
                </a>
                <div class="blog-date">
                    <span class="day"><?= date('d', $blog_date) ?></span>
                    <span class="month"><?= date('M', $blog_date) ?></span>
                </div>
            </div>
            <div class="blog-content">
                <div class="blog-meta">
                    <span><i class="fa-solid fa-user"></i> <?= htmlspecialchars($blog['author']) ?></span>
                    <span><i class="fa-solid fa-folder-open"></i> Auto Parts</span>
                </div>
                <h3><a href="blog-details.php?slug=<?= $blog['slug'] ?>"><?= htmlspecialchars($blog['title']) ?></a>
                </h3>
                <p><?= strip_tags(substr($blog['description'], 0, 100)) ?>...</p>
                <a href="blog-details.php?slug=<?= $blog['slug'] ?>" class="read-more-btn">Read Article <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
        <?php 
                $delay++; if($delay > 2) $delay = 0; 
                } 
            } else {
                echo "<p class='text-center w-100'>No blogs available at the moment.</p>";
            }
            ?>
    </div>

    <!-- Dynamic Pagination -->
    <?php if($total_pages > 1) { ?>
    <div class="pagination-wrapper fade-up" style="margin-top: 50px;">
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

<?php 
$conn->close();
include ("include/footer.php"); 
?>
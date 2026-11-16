<?php
// Database Connection
include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get Blog by Slug
$slug = isset($_GET['slug']) ? $conn->real_escape_string($_GET['slug']) : '';

if(empty($slug)) {
    header("Location: blogs.php"); // Redirect if no slug
    exit;
}

$query = "SELECT * FROM blogs WHERE slug = '$slug' AND status = 1";
$result = $conn->query($query);

if($result->num_rows == 0) {
    header("Location: blogs.php"); // Redirect if blog not found
    exit;
}

$blog = $result->fetch_assoc();
$pageTitle = htmlspecialchars($blog['title']); // Dynamic Page Title

include 'include/header.php';
include 'include/breadcrumb.php';

$main_img = !empty($blog['image']) ? 'admin/assets/img/uploads/blogs/'.$blog['image'] : 'images/project/placeholder.jpg';
$blog_date = strtotime($blog['created_at']);
?>

<!-- ================= Blog Details Section ================= -->
<section class="blog-details-section container">
    <div class="blog-details-layout">

        <!-- Main Content Area -->
        <div class="blog-main-content fade-up">
            <div class="post-featured-image">
                <img src="<?= $main_img ?>" alt="<?= htmlspecialchars($blog['title']) ?>"
                    style="width:100%; height:450px; object-fit:cover;">
                <div class="blog-date large">
                    <span class="day"><?= date('d', $blog_date) ?></span>
                    <span class="month"><?= date('M', $blog_date) ?></span>
                </div>
            </div>

            <div class="post-meta-details">
                <span><i class="fa-solid fa-user"></i> By <?= htmlspecialchars($blog['author']) ?></span>
                <span><i class="fa-solid fa-folder-open"></i> Auto Parts</span>
                <span><i class="fa-regular fa-calendar"></i> <?= date('F j, Y', $blog_date) ?></span>
            </div>

            <div class="post-body">
                <h2><?= htmlspecialchars($blog['title']) ?></h2>

                <!-- Dynamic Content with HTML preserved (from text editor) -->
                <div style="margin-top: 20px; line-height: 1.8; color: #555;">
                    <?= $blog['description'] ?>
                </div>

                <div class="post-tags-share" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee;">
                    <div class="tags">
                        <strong>Tags:</strong>
                        <a href="products">Auto Parts</a>
                        <a href="products">Maintenance</a>
                    </div>
                    <div class="share">
                        <strong>Share:</strong>
                        <?php $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($current_url) ?>"
                            target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode($current_url) ?>&text=<?= urlencode($blog['title']) ?>"
                            target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://api.whatsapp.com/send?text=<?= urlencode($blog['title'] . " " . $current_url) ?>"
                            target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Area -->
        <div class="blog-sidebar fade-up delay-1">
            <!-- Search Widget (Optional Integration) -->
            <div class="sidebar-widget">
                <h3 class="widget-title">Search</h3>
                <form action="blogs.php" method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Search here...">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <!-- Dynamic Recent Posts Widget -->
            <div class="sidebar-widget">
                <h3 class="widget-title">Recent Posts</h3>
                <div class="recent-post-list">
                    <?php
                    $recent_query = "SELECT * FROM blogs WHERE status = 1 AND blog_id != {$blog['blog_id']} ORDER BY blog_id DESC LIMIT 4";
                    $recent_result = $conn->query($recent_query);
                    if($recent_result->num_rows > 0) {
                        while($recent = $recent_result->fetch_assoc()) {
                            $r_img = !empty($recent['image']) ? 'admin/uploads/blogs/'.$recent['image'] : 'images/project/placeholder.jpg';
                    ?>
                    <div class="recent-post-item"
                        style="display:flex; gap:15px; margin-bottom:15px; align-items:center;">
                        <img src="<?= $r_img ?>" alt="<?= htmlspecialchars($recent['title']) ?>"
                            style="width:70px; height:70px; object-fit:cover; border-radius:5px;">
                        <div class="rp-info">
                            <h4 style="font-size:15px; margin:0; line-height:1.4;">
                                <a href="blog-details.php?slug=<?= $recent['slug'] ?>"
                                    style="color:#111; text-decoration:none;">
                                    <?= htmlspecialchars($recent['title']) ?>
                                </a>
                            </h4>
                            <span style="font-size:13px; color:#888;"><i class="fa-regular fa-calendar"></i>
                                <?= date('d M, Y', strtotime($recent['created_at'])) ?></span>
                        </div>
                    </div>
                    <?php } } else { echo "<p>No recent posts.</p>"; } ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
$conn->close();
include 'include/footer.php';
?>
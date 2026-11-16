<?php 
$pageTitle = "Our Products"; 
include 'include/header.php'; 
include 'include/breadcrumb.php'; 
include 'config/connect.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination Logic
$limit = 9; // Number of products per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Category Filter Logic (Optional if you want to filter by category ID in URL like ?cat=123)
$cat_filter = isset($_GET['cat']) ? $conn->real_escape_string($_GET['cat']) : '';
$where_clause = "WHERE p.status = 1";
if(!empty($cat_filter)) {
    $where_clause .= " AND p.pro_cate = '$cat_filter'";
}

// Total products count for pagination
$total_query = "SELECT COUNT(id) as total FROM products p $where_clause";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);
?>

<!-- ================= Main Products Section ================= -->
<section class="shop-section container">

    <!-- Dynamic Category Filter Bar -->
    <div class="product-filters fade-up">
        <a href="products" class="filter-btn <?= empty($cat_filter) ? 'active' : '' ?>"
            style="text-decoration:none;">All Parts</a>
        <?php
            // Fetch categories for filters
            $cat_query = "SELECT * FROM categories WHERE status = 1";
            $cat_result = $conn->query($cat_query);
            if($cat_result->num_rows > 0) {
                while($cat = $cat_result->fetch_assoc()) {
                    $active_class = ($cat_filter == $cat['cate_id']) ? 'active' : '';
                    echo '<a href="?cat='.$cat['cate_id'].'" class="filter-btn '.$active_class.'" style="text-decoration:none;">'.htmlspecialchars($cat['categories']).'</a>';
                }
            }
            ?>
    </div>

    <!-- Products Grid -->
    <div class="shop-grid">
        <?php
            // Fetch Products with Category Join
            $product_query = "SELECT p.*, c.categories as category_name FROM products p 
                              LEFT JOIN categories c ON p.pro_cate = c.cate_id 
                              $where_clause ORDER BY p.id DESC LIMIT $limit OFFSET $offset";
            $product_result = $conn->query($product_query);
            $delay = 0;

            if($product_result->num_rows > 0) {
                while($product = $product_result->fetch_assoc()) {
                    $img_path = !empty($product['pro_img']) ? 'admin/assets/img/uploads/'.$product['pro_img'] : 'images/project/placeholder.jpg';
            ?>
        <div class="shop-card fade-up delay-<?= $delay ?>">
            <div class="shop-img-wrapper">
                <!-- Link points to slug-based URL -->
                <a href="product-details.php?slug=<?= $product['slug_url'] ?>">
                    <img src="<?= $img_path ?>" alt="<?= htmlspecialchars($product['pro_name']) ?>"
                        style="width:100%; height:250px; object-fit:cover;">
                </a>
                <div class="shop-overlay">
                    <a href="contact" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Get Quote</a>
                </div>
            </div>
            <div class="shop-info">
                <span
                    class="category-tag"><?= !empty($product['category_name']) ? htmlspecialchars($product['category_name']) : 'Auto Parts' ?></span>
                <h3><a
                        href="product-details.php?slug=<?= $product['slug_url'] ?>"><?= htmlspecialchars($product['pro_name']) ?></a>
                </h3>
                <p><?= strip_tags(substr($product['short_desc'], 0, 70)) ?>...</p>
            </div>
        </div>
        <?php 
                $delay++; if($delay > 2) $delay = 0; 
                } 
            } else {
                echo "<p class='text-center w-100'>No products found.</p>";
            }
            ?>
    </div>

    <!-- Dynamic Pagination -->
    <?php if($total_pages > 1) { ?>
    <div class="pagination-wrapper fade-up">
        <ul class="pagination">
            <?php if($page > 1) { ?>
            <li><a href="?page=<?= $page - 1 ?><?= !empty($cat_filter) ? '&cat='.$cat_filter : '' ?>" class="prev"><i
                        class="fa-solid fa-angle-left"></i></a></li>
            <?php } ?>

            <?php for($i = 1; $i <= $total_pages; $i++) { ?>
            <li><a href="?page=<?= $i ?><?= !empty($cat_filter) ? '&cat='.$cat_filter : '' ?>"
                    class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a></li>
            <?php } ?>

            <?php if($page < $total_pages) { ?>
            <li><a href="?page=<?= $page + 1 ?><?= !empty($cat_filter) ? '&cat='.$cat_filter : '' ?>" class="next"><i
                        class="fa-solid fa-angle-right"></i></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

</section>

<?php 
$conn->close();
include 'include/footer.php'; 
?>
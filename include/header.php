<?php 
// Database Connection (Global for all pages)
include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Current page check for active links
$current_page = basename($_SERVER['PHP_SELF']); 

// Fetch Contact Data (Global for Header & Footer)
$contact_query = "SELECT * FROM contacts LIMIT 1";
$contact_result = $conn->query($contact_query);
$contact = $contact_result->fetch_assoc();

// Fetch Header Logo
$logo_header_query = "SELECT logo_path FROM logos WHERE location = 'header' AND is_active = 1 ORDER BY id DESC LIMIT 1";
$logo_header_result = $conn->query($logo_header_query);
$logo_header = $logo_header_result->fetch_assoc();
$header_logo_src = !empty($logo_header['logo_path']) ? 'admin/'.$logo_header['logo_path'] : 'images/logo/logo.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mona Motors | Premium Auto Spare Parts</title>

    <link rel="icon" type="image/png" href="images/logo/favicon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/include.css">
    <link rel="stylesheet" href="style/about.css">
    <link rel="stylesheet" href="style/products.css">
    <link rel="stylesheet" href="style/blog.css">
    <link rel="stylesheet" href="style/contact.css">
</head>

<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="contact-info">
                <?php $header_email = !empty($contact['contact_email']) ? $contact['contact_email'] : 'monamotors@hotmail.com'; ?>
                <span><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($header_email) ?></span>

                <!-- Shortened Address for Header to prevent design break -->
                <?php 
                $full_address = !empty($contact['address']) ? strip_tags($contact['address']) : 'Lamington Rd., Opera House, Mumbai';
                $short_address = mb_strimwidth($full_address, 0, 40, '...'); // Trim to 40 characters
                ?>
                <span><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($short_address) ?></span>
            </div>
            <div class="social-links">
                <?php 
                $phone1 = !empty($contact['phone']) ? $contact['phone'] : '91675 32223';
                $phone2 = !empty($contact['wp_number']) ? $contact['wp_number'] : '94086 46667';
                ?>
                <span><i class="fa-solid fa-phone"></i> <?= htmlspecialchars($phone1) ?> |
                    <?= htmlspecialchars($phone2) ?></span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <header class="main-header">
        <div class="container header-inner">

            <div class="logo">
                <a href="./">
                    <img src="<?= $header_logo_src ?>" alt="Mona Motors Logo" class="brand-logo"
                        onerror="this.src='images/logo/logo.png'">
                </a>
            </div>

            <!-- Navbar Area -->
            <nav class="navbar" id="navbar">
                <div class="mobile-menu-close" id="menu-close-btn"><i class="fa-solid fa-xmark"></i></div>

                <ul class="nav-links">
                    <li><a href="./" class="<?= ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="about" class="<?= ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a>
                    </li>

                    <li class="dropdown">
                        <a href="products"
                            class="<?= ($current_page == 'products.php' || $current_page == 'product-details.php') ? 'active' : ''; ?>">Products
                            <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <?php
                            // Check for Categories first
                            $cat_query = "SELECT * FROM categories WHERE status = 1 LIMIT 8";
                            $cat_result = $conn->query($cat_query);
                            
                            if($cat_result->num_rows > 0) {
                                // If categories exist, show categories
                                while($cat = $cat_result->fetch_assoc()) {
                                    echo '<li><a href="products.php?cat='.$cat['cate_id'].'">'.htmlspecialchars($cat['categories']).'</a></li>';
                                }
                            } else {
                                // If no categories, show latest 8 products
                                $prod_query = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 8";
                                $prod_result = $conn->query($prod_query);
                                if($prod_result->num_rows > 0) {
                                    while($prod = $prod_result->fetch_assoc()) {
                                        echo '<li><a href="product-details.php?slug='.$prod['slug_url'].'">'.htmlspecialchars($prod['pro_name']).'</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="#">No Products Found</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </li>

                    <li><a href="gallery" class="<?= ($current_page == 'gallery.php') ? 'active' : ''; ?>">Gallery</a>
                    </li>
                    <li><a href="blogs"
                            class="<?= ($current_page == 'blogs.php' || $current_page == 'blog-details.php') ? 'active' : ''; ?>">Blogs</a>
                    </li>
                    <li><a href="contact" class="<?= ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="header-action">
                <a href="contact.php" class="btn-primary desktop-btn">Get a Quote <i
                        class="fa-solid fa-arrow-right"></i></a>
                <button class="mobile-menu-btn" id="mobile-menu-btn"><i class="fa-solid fa-bars"></i></button>
            </div>

        </div>

        <div class="menu-overlay" id="menu-overlay"></div>
    </header>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('menu-close-btn');
        const navbar = document.getElementById('navbar');
        const overlay = document.getElementById('menu-overlay');

        function toggleMenu() {
            navbar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        menuBtn.addEventListener('click', toggleMenu);
        closeBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    });
    </script>
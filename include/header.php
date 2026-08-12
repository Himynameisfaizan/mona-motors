<?php 
// Current page ka naam nikalne ke liye
$current_page = basename($_SERVER['PHP_SELF']); 
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
                <span><i class="fa-solid fa-envelope"></i> monamotors@hotmail.com</span>
                <span><i class="fa-solid fa-location-dot"></i> Lamington Rd., Opera House, Mumbai</span>
            </div>
            <div class="social-links">
                <span><i class="fa-solid fa-phone"></i> 91675 32223 | 94086 46667</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <header class="main-header">
        <div class="container header-inner">
            
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo/logo.png" alt="Mona Motors Logo" class="brand-logo">
                </a>
            </div>
            
            <!-- Navbar Area -->
            <nav class="navbar" id="navbar">
                <!-- Close Icon for Mobile -->
                <div class="mobile-menu-close" id="menu-close-btn"><i class="fa-solid fa-xmark"></i></div>
                
                <ul class="nav-links">
                    <li><a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
                    <li class="dropdown">
                        <a href="products.php" class="<?php echo ($current_page == 'products.php' || $current_page == 'product-details.php') ? 'active' : ''; ?>">Products <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Power Window Switch</a></li>
                            <li><a href="#">Fuel Gauge</a></li>
                            <li><a href="#">AC Vent Innova</a></li>
                            <li><a href="#">Blower Motor</a></li>
                        </ul>
                    </li>
                    <li><a href="gallery.php" class="<?php echo ($current_page == 'gallery.php') ? 'active' : ''; ?>">Gallery</a></li>
                    <li><a href="blogs.php" class="<?php echo ($current_page == 'blogs.php' || $current_page == 'blog-details.php') ? 'active' : ''; ?>">Blogs</a></li>
                    <li><a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
                </ul>
            </nav>
            
            <div class="header-action">
                <a href="contact.php" class="btn-primary desktop-btn">Get a Quote <i class="fa-solid fa-arrow-right"></i></a>
                <!-- Hamburger Icon for Mobile -->
                <button class="mobile-menu-btn" id="mobile-menu-btn"><i class="fa-solid fa-bars"></i></button>
            </div>
            
        </div>
        
        <!-- Mobile Menu Overlay Background -->
        <div class="menu-overlay" id="menu-overlay"></div>
    </header>

    <!-- Mobile Menu Script -->
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
            overlay.addEventListener('click', toggleMenu); // Closes menu when clicking outside
        });
    </script>
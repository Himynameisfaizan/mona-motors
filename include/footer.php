<?php
include 'config/connect.php';
// Fetch Footer Logo
$logo_footer_query = "SELECT logo_path FROM logos WHERE location = 'footer' AND is_active = 1 ORDER BY id DESC LIMIT 1";
$logo_footer_result = $conn->query($logo_footer_query);
$logo_footer = $logo_footer_result->fetch_assoc();
$footer_logo_src = !empty($logo_footer['logo_path']) ? 'admin/'.$logo_footer['logo_path'] : 'images/logo/logo.png';
?>
<!-- Footer Section -->
<footer class="main-footer"
    style="background-image: url('images/section-bg/footer-bg-one.jpg'); background-size: cover; position: relative;">
    <div class="footer-overlay"></div>
    <div class="container footer-grid">

        <div class="footer-widget about-widget">
            <div class="footer-logo">
                <img src="<?= $footer_logo_src ?>" alt="Mona Motors Logo" style="max-height: 50px; margin-bottom: 20px;"
                    onerror="this.src='images/logo/logo.png'">
            </div>
            <p>Your trusted stockist for all types of car spare parts. Delivering reliability, durability, and premium
                automotive solutions to our clients.</p>
            <div class="footer-social">
                <?php if(!empty($contact['facebook'])) { ?>
                <a href="<?= htmlspecialchars($contact['facebook']) ?>" target="_blank"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <?php } ?>
                <?php if(!empty($contact['twitter'])) { ?>
                <a href="<?= htmlspecialchars($contact['twitter']) ?>" target="_blank"><i
                        class="fa-brands fa-twitter"></i></a>
                <?php } ?>
                <?php if(!empty($contact['instagram'])) { ?>
                <a href="<?= htmlspecialchars($contact['instagram']) ?>" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
                <?php } ?>
                <?php if(!empty($contact['linkdin'])) { ?>
                <a href="<?= htmlspecialchars($contact['linkdin']) ?>" target="_blank"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                <?php } ?>
            </div>
        </div>

        <div class="footer-widget links-widget">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="products.php">Our Products</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-widget contact-widget">
            <h3>Get In Touch</h3>
            <ul class="contact-list">
                <li>
                    <i class="fa-solid fa-location-dot"></i>
                    <!-- Full Address in Footer -->
                    <span><?= !empty($contact['address']) ? nl2br(htmlspecialchars($contact['address'])) : 'Shop No. 418, 1st Floor, Rawal Bldg.,<br> Opp. Indusind Bank, Lamington Rd.,<br> Opera House, Mumbai 400 004' ?></span>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <span><a href="mailto:<?= htmlspecialchars($header_email) ?>"
                            style="color: inherit; text-decoration: none;"><?= htmlspecialchars($header_email) ?></a></span>
                </li>

                <?php if(!empty($contact['phone'])) { ?>
                <li class="phones">
                    <i class="fa-solid fa-phone"></i>
                    <div><span><a href="tel:<?= htmlspecialchars($contact['phone']) ?>"
                                style="color: inherit; text-decoration: none;"><?= htmlspecialchars($contact['phone']) ?></a></span>
                    </div>
                </li>
                <?php } ?>

                <?php if(!empty($contact['wp_number'])) { ?>
                <li class="phones">
                    <i class="fa-brands fa-whatsapp"></i>
                    <div><span><a
                                href="https://wa.me/<?= htmlspecialchars(preg_replace('/[^0-9]/', '', $contact['wp_number'])) ?>"
                                target="_blank"
                                style="color: inherit; text-decoration: none;"><?= htmlspecialchars($contact['wp_number']) ?></a></span>
                    </div>
                </li>
                <?php } ?>

                <?php if(!empty($contact['telephone'])) { ?>
                <li class="phones">
                    <i class="fa-solid fa-phone"></i>
                    <div><span><a href="tel:<?= htmlspecialchars($contact['telephone']) ?>"
                                style="color: inherit; text-decoration: none;"><?= htmlspecialchars($contact['telephone']) ?></a></span>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Mona Motors. All rights reserved. Designed & Developed by Digital Web
                Trackers.</p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script>
// Sticky Header Script
window.addEventListener('scroll', function() {
    const header = document.querySelector('.main-header');
    if (window.scrollY > 50) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});
</script>
</body>

</html>
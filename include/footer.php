<!-- Footer Section -->
    <footer class="main-footer" style="background-image: url('images/section-bg/footer-bg-one.jpg'); background-size: cover; position: relative;">
        <div class="footer-overlay"></div>
        <div class="container footer-grid">
            <div class="footer-widget about-widget">
                <div class="footer-logo">
                    <img src="images/logo/logo.png" alt="Mona Motors Logo" style="max-height: 50px; margin-bottom: 20px;">
                </div>
                <p>Your trusted stockist for all types of car spare parts. Delivering reliability, durability, and premium automotive solutions to our clients.</p>
                <div class="footer-social">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
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
                        <span>Shop No. 418, 1st Floor, Rawal Bldg.,<br> Opp. Indusind Bank, Lamington Rd.,<br> Opera House, Mumbai 400 004</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <span>monamotors@hotmail.com</span>
                    </li>
                    <li class="phones">
                        <i class="fa-solid fa-phone"></i>
                        <div><span>+91 91675 32223</span></div>
                    </li>
                    <li class="phones">
                        <i class="fa-solid fa-phone"></i>
                        <div><span>+91 94086 46667</span></div>
                    </li>
                    <li class="phones">
                        <i class="fa-solid fa-phone"></i>
                        <div><span>+91 91674 79626</span></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; <?php echo date("Y"); ?> Mona Motors. All rights reserved. Designed & Developed by Digital Web Trackers.</p>
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
<?php
$pageTitle = "Contact Us";
include("include/header.php");
include("include/breadcrumb.php");
?>

<!-- ================= Contact Section ================= -->
<section class="contact-section container">
    <div class="contact-layout">

        <!-- Contact Information -->
        <div class="contact-info-wrapper fade-up">
            <div class="section-title">
                <span class="sub-title">Get In Touch</span>
                <h2>We're Here to Help!</h2>
                <p>Reach out to Mona Motors for any inquiries regarding auto spare parts, bulk orders, or specific vehicle requirements.</p>
            </div>

            <div class="contact-info-list">
                <!-- Address -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="details">
                        <h4>Office Address</h4>
                        <p>Shop No. 418, 1st Floor, Rawal Bldg.,<br> Opp. Indusind Bank, Lamington Rd.,<br> Opera House, Mumbai 400 004</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="details">
                        <h4>Email Us</h4>
                        <p><a href="mailto:monamotors@hotmail.com">monamotors@hotmail.com</a></p>
                    </div>
                </div>

                <!-- Phones -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="details">
                        <h4>Call Us</h4>
                        <p><strong>Pankaj:</strong> +91 91675 32223</p>
                        <p><strong>Abhishek:</strong> +91 94086 46667</p>
                        <p><strong>Ajay:</strong> +91 91674 79626</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper fade-up delay-1">
            <form action="#" method="POST" class="contact-form">
                <h3>Send a Message</h3>

                <div class="input-row">
                    <div class="input-group">
                        <label>Your Name *</label>
                        <input type="text" placeholder="John Doe" required>
                    </div>
                    <div class="input-group">
                        <label>Email Address *</label>
                        <input type="email" placeholder="john@example.com" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-group">
                        <label>Phone Number *</label>
                        <input type="tel" placeholder="+91 98765 43210" required>
                    </div>
                    <div class="input-group">
                        <label>Subject</label>
                        <input type="text" placeholder="Part Inquiry">
                    </div>
                </div>

                <div class="input-group">
                    <label>Your Message *</label>
                    <textarea rows="5" placeholder="Tell us what you need..." required></textarea>
                </div>

                <button type="submit" class="btn-primary btn-large">Send Message <i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>

    </div>
</section>

<!-- ================= Google Map Section ================= -->
<section class="map-section fade-up delay-2">
    <div class="container">
        <div class="map-wrapper">
            <!-- Google Maps Embed for Lamington Road, Mumbai -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15088.36869408977!2d72.81050225134768!3d18.96105814526058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce740c498005%3A0x6a02c34d081f26f!2sLamington%20Rd%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


<?php include("include/footer.php") ?>
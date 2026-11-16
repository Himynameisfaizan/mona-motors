<?php
$pageTitle = "Contact Us";
include("include/header.php");
include("include/breadcrumb.php");

include 'config/connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Contact Data
$contact_query = "SELECT * FROM contacts LIMIT 1";
$contact_result = $conn->query($contact_query);
$contact = $contact_result->fetch_assoc();
?>

<!-- ================= Contact Section ================= -->
<section class="contact-section container">
    <div class="contact-layout">

        <!-- Dynamic Contact Information -->
        <div class="contact-info-wrapper fade-up">
            <div class="section-title">
                <span class="sub-title">Get In Touch</span>
                <h2>We're Here to Help!</h2>
                <p>Reach out to Mona Motors for any inquiries regarding auto spare parts, bulk orders, or specific
                    vehicle requirements.</p>
            </div>

            <div class="contact-info-list">
                <!-- Address -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="details">
                        <h4>Office Address</h4>
                        <p><?= !empty($contact['address']) ? nl2br(htmlspecialchars($contact['address'])) : 'Shop No. 418, 1st Floor, Rawal Bldg., Mumbai' ?>
                        </p>
                        <?php if(!empty($contact['address2'])) { echo "<p>".nl2br(htmlspecialchars($contact['address2']))."</p>"; } ?>
                    </div>
                </div>

                <!-- Email -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="details">
                        <h4>Email Us</h4>
                        <?php $email = !empty($contact['contact_email']) ? $contact['contact_email'] : (!empty($contact['email']) ? $contact['email'] : 'monamotors@hotmail.com'); ?>
                        <p><a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a></p>
                    </div>
                </div>

                <!-- Phones -->
                <div class="contact-info-item">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="details">
                        <h4>Call Us</h4>
                        <?php if(!empty($contact['phone'])) { ?><p><a
                                href="tel:<?= htmlspecialchars($contact['phone']) ?>"><?= htmlspecialchars($contact['phone']) ?></a>
                        </p><?php } ?>
                        <?php if(!empty($contact['wp_number'])) { ?><p><a
                                href="tel:<?= htmlspecialchars($contact['wp_number']) ?>"><?= htmlspecialchars($contact['wp_number']) ?>
                                (WhatsApp)</a></p><?php } ?>
                        <?php if(!empty($contact['telephone'])) { ?><p><a
                                href="tel:<?= htmlspecialchars($contact['telephone']) ?>"><?= htmlspecialchars($contact['telephone']) ?></a>
                        </p><?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form (Ready for POST submission) -->
        <div class="contact-form-wrapper fade-up delay-1">
            <form action="contact_process.php" method="POST" class="contact-form">
                <h3>Send a Message</h3>

                <div class="input-row">
                    <div class="input-group">
                        <label>Your Name *</label>
                        <input type="text" name="name" placeholder="John Doe" required>
                    </div>
                    <div class="input-group">
                        <label>Email Address *</label>
                        <input type="email" name="email" placeholder="john@example.com" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-group">
                        <label>Phone Number *</label>
                        <input type="tel" name="phone" placeholder="+91 98765 43210" required>
                    </div>
                    <div class="input-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Part Inquiry">
                    </div>
                </div>

                <div class="input-group">
                    <label>Your Message *</label>
                    <textarea name="message" rows="5" placeholder="Tell us what you need..." required></textarea>
                </div>

                <button type="submit" name="submit_inquiry" class="btn-primary btn-large">Send Message <i
                        class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>

    </div>
</section>

<!-- ================= Dynamic Google Map Section ================= -->
<section class="map-section fade-up delay-2">
    <div class="container">
        <div class="map-wrapper">
            <?php 
            // Fallback map if database is empty
            $map_url = !empty($contact['map']) ? $contact['map'] : "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15088.36869408977!2d72.81050225134768!3d18.96105814526058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce740c498005%3A0x6a02c34d081f26f!2sLamington%20Rd%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin";
            ?>
            <iframe src="<?= $map_url ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php 
$conn->close();
include("include/footer.php"); 
?>
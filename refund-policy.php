<?php 
$pageTitle = "Refund and Cancellation Policy";
include 'include/header.php'; 
include 'include/breadcrumb.php'; 
?>

<section class="policy-section container" style="padding: 80px 0;">
    <div class="policy-content-wrapper fade-up"
        style="background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
        <div class="section-title">
            <span class="sub-title">Returns & Refunds</span>
            <h2>Refund and Cancellation Policy</h2>
            <p class="text-muted" style="margin-top: 10px;"><strong>Last Updated:</strong> <?= date('F d, Y'); ?></p>
        </div>

        <div class="policy-body" style="color: #555; line-height: 1.8;">
            <p>At <strong>Mona Motors</strong>, we strive to ensure the highest quality of our auto spare parts. We
                understand that ordering the correct automotive part can sometimes be tricky. Therefore, we have
                established a clear and fair cancellation and refund policy.</p>

            <h3
                style="color: #111; margin-top: 40px; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                Cancellation Policy</h3>

            <h4 style="color: var(--primary-red, #e3000f); margin-top: 20px; font-size: 18px;">1. Order Cancellation
                Before Dispatch</h4>
            <p>You may cancel your order within <strong>24 hours</strong> of placing it, provided the order has not yet
                been processed, packed, or dispatched from our facility. A full refund will be initiated immediately. To
                request a cancellation, please contact us at <strong>monamotors@hotmail.com</strong> with your Order ID.
            </p>

            <h4 style="color: var(--primary-red, #e3000f); margin-top: 20px; font-size: 18px;">2. Cancellation After
                Dispatch</h4>
            <p>Once your auto parts have been handed over to our logistics partners, the order cannot be cancelled. If a
                delivery is refused by the buyer, shipping and return handling charges will be deducted from the final
                refund amount.</p>

            <h3
                style="color: #111; margin-top: 50px; font-size: 24px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                Return and Refund Policy</h3>

            <h4 style="color: var(--primary-red, #e3000f); margin-top: 20px; font-size: 18px;">1. 7-Day Easy Returns
            </h4>
            <p>We offer an Easy Return policy within <strong>7 days</strong> of delivery under the following
                circumstances:</p>
            <ul style="margin-left: 20px; margin-bottom: 20px;">
                <li>The part received is physically damaged during transit.</li>
                <li>The incorrect part or model was delivered to you.</li>
                <li>The product has a verified manufacturing defect.</li>
            </ul>
            <p><em>Note: Electrical parts (like power window switches, sensors, or motors) must not have been installed
                    or tampered with. If an electrical part is burnt due to a short circuit in your vehicle during
                    installation, the return will be rejected.</em></p>

            <h4 style="color: var(--primary-red, #e3000f); margin-top: 20px; font-size: 18px;">2. Condition of Returned
                Items</h4>
            <p>To be eligible for a return, your item must be unused, in the exact same condition that you received it,
                and in its original packaging with all tags and seals intact.</p>

            <h4 style="color: var(--primary-red, #e3000f); margin-top: 20px; font-size: 18px;">3. Refund Processing</h4>
            <p>Once your returned part is received and inspected by our Quality Check team, we will notify you of the
                approval or rejection of your refund. If approved, the refund will be processed automatically to your
                original method of payment within <strong>5 to 7 business days</strong>.</p>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>
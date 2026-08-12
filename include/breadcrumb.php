<?php
// Agar galti se pageTitle set karna bhool gaye, toh error na aaye isliye default value set ki hai
if (!isset($pageTitle)) {
    $pageTitle = "Mona Motors";
}
?>

<!-- Breadcrumb Section -->
<section class="breadcrumb-section" style="background-image: url('images/section-bg/about-sec-bg.jpg');">
    <div class="breadcrumb-overlay"></div>
    <div class="container breadcrumb-content">
        <h1 class="page-title fade-up"><?php echo htmlspecialchars($pageTitle); ?></h1>
        
        <nav aria-label="breadcrumb" class="fade-up delay-1">
            <ol class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item separator">
                    <i class="fa-solid fa-angle-right"></i>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo htmlspecialchars($pageTitle); ?>
                </li>
            </ol>
        </nav>
    </div>
</section>
<?php include '../includes/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../admin/assets/css/style.css">
<style>
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fff8f5;
        color: #333;
    }
    .about-section {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 10%;
        gap: 50px;
        flex-wrap: wrap;
        background: linear-gradient(135deg, #ffe0ec, #fff8f5);
    }
    .about-section img {
        max-width: 450px;
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        transition: transform 0.4s ease;
    }
    .about-section img:hover {
        transform: scale(1.05);
    }
    .about-content {
        max-width: 500px;
    }
    .about-content h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: #d63384;
    }
    .about-content p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #555;
    }

    /* Stats Section */
    .stats-section {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 10%;
        gap: 50px;
        flex-wrap: wrap;
        background: linear-gradient(135deg, #fff8f5, #ffe0ec);
    }
    .stats-image img {
        max-width: 450px;
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    .stats-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 40px;
    }
    .stat {
        text-align: left;
    }
    .stat h2 {
        font-size: 2.5rem;
        color: #d63384;
        margin-bottom: 5px;
    }
    .stat p {
        font-size: 1rem;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-section, .stats-section {
            flex-direction: column;
            text-align: center;
        }
        .stat {
            text-align: center;
        }
    }
</style>

<!-- About Section -->
<section class="about-section">
    <img src="../assets/img/logo.jpg" alt="Ice Cream Shop">
    <div class="about-content">
        <h1>About Our Ice Cream World</h1>
        <p>Welcome to our sweet paradise, where every scoop tells a story. For years, we’ve been crafting flavors that bring smiles, using only the freshest ingredients and a pinch of love. From classic favorites to unique creations, our ice cream is designed to delight every taste bud.</p>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-image">
        <img src="../assets/img/landing.jpg" alt="Our Journey">
    </div>
    <div class="stats-content">
        <div class="stat">
            <h2>50+</h2>
            <p>Unique Flavors Created</p>
        </div>
        <div class="stat">
            <h2>10K+</h2>
            <p>Happy Customers Served</p>
        </div>
        <div class="stat">
            <h2>6+</h2>
            <p>Years of Ice Cream Excellence</p>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

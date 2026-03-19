<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | Scoopy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <style>
    .contact-hero {
      background: linear-gradient(45deg, #ffdee9, #b5fffc);
      padding: 60px 0;
    }
    .contact-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .contact-info i {
      font-size: 1.5rem;
      color: #0d6efd;
      margin-right: 10px;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<main class="flex-grow-1">
    <div class="container mt-4">
    <?php if (isset($_GET['success'])): ?>
      <div class="alert alert-success">✅ Thank you! Your message has been sent.</div>
    <?php elseif (isset($_GET['error'])): ?>
      <div class="alert alert-danger">❌ Something went wrong. Please try again.</div>
    <?php endif; ?>
  </div>
  <section class="contact-hero text-center">
    <div class="container">
      <h1 class="display-5 fw-bold">📞 Get In Touch With Us</h1>
      <p class="lead text-muted">We’re happy to hear from you! Use the form below to drop us a message.</p>
    </div>
  </section>

  <section class="container my-5">
    <div class="row g-4">
      <!-- Contact Information -->
      <div class="col-md-5">
        <div class="contact-box h-100">
          <h4>Contact Details</h4>
          <div class="contact-info mt-4">
            <p><i class="bi bi-geo-alt-fill"></i> Finsensvej 41, 2000 Frederiksberg, Denmark</p>
            <p><i class="bi bi-telephone-fill"></i> +4542347624</p>
            <p><i class="bi bi-envelope-fill"></i> aryalrima789@gmail.com</p>
            <hr>
            <h5>Opening Hours</h5>
            <p>Monday       :11:00 AM - 22:00 PM<br>
               Tuesday      :11:00 AM - 22:00 PM<br>
               Wednesday    :11:00 AM - 22:00 PM<br>
               Thrusday     :11:00 AM - 22:00 PM<br>
               Friday       :11:00 AM - 22:00 PM<br>
               Saturday     :11:00 AM - 22:00 PM<br>
               Sunday       :11:00 AM - 22:00 PM</p>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-md-7">
        <div class="contact-box">
          <h4>Send Us a Message</h4>
          <form method="POST" action="contact_submit.php">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" required placeholder="Your name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" required placeholder="you@example.com">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" placeholder="Optional">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea name="message" rows="5" class="form-control" required placeholder="Type your message here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>

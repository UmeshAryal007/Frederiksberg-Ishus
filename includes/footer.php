<!-- Footer -->
<footer class="bg-dark text-white p-4 mt-5" id="contact">
  <div class="container text-center">
    <p><strong>Contact:</strong> <?= htmlspecialchars($settings['contact_phone']) ?> | <?= htmlspecialchars($settings['contact_email']) ?></p>
    <p><strong>Opening Hours:</strong> <?= htmlspecialchars($settings['shop_hours']) ?></p>
    <p class="mb-0">© <?= date('Y') ?> <?= htmlspecialchars($settings['shop_name']) ?>. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

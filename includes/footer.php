<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<footer class="py-4 text-center text-light">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 mb-3">
            <div>
                <i class="bi bi-envelope fs-5 text-danger me-2"></i> support@ekos.id
            </div>
            <div>
                <i class="bi bi-instagram fs-5 text-danger me-2"></i> ekos.surabaya
            </div>
            <div>
                <i class="bi bi-facebook fs-5 text-primary me-2"></i> EkoSurabaya
            </div>
            <div>
                <i class="bi bi-twitter fs-5 text-info me-2"></i> ekosurabaya
            </div>
        </div>

        <div class="text-light">
            Surabaya, Jawa Timur, Indonesia | <i class="bi bi-telephone-fill me-1"></i> +62 823 4567 890
        </div>

        <p class="mt-3 text-secondary">&copy; 2025 eKos - Platform Pencarian Kos. All Rights Reserved.</p>
    </div>
</footer>
<?php if (isset($_SESSION['log'])): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <?= $_SESSION['log']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['log']); ?>
<?php endif; ?>
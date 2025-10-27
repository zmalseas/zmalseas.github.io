<?php if (!defined('ABSPATH')) { exit; } ?>
</main>

<?php
$footerPartial = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/') . '/partials/footer.php';
if (is_file($footerPartial)) {
  require $footerPartial; // includes chat container rendering
} else {
  echo '<footer class="site-footer"><div class="footer-content"><div class="copyright"><p>© '.date('Y').' Nerally</p></div></div></footer>';
}
?>

<?php wp_footer(); ?>
</body>
</html>

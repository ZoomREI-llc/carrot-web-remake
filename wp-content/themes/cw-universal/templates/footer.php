<footer class="cwu-footer">
    <div class="grid-container">
        <div class="cwu-footer__logo">
            <?= get_custom_logo(); ?>
        </div>
        <div class="cwu-footer__text">
            <p>We are a real estate solutions and investment firm that helps homeowners get rid of burdensome houses, fast. We can buy your house immediately with a fair cash offer and zero hassle</p>
            <p>© <?= date('Y')?> <?= get_blog_option(get_current_blog_id(), 'company_name', '') ?> LLC</p>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>
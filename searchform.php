<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
    <button type="submit" class="submit" name="submit" id="searchsubmit">
        <i class="fas fa-search"></i>
    </button>
</form>
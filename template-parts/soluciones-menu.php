



<section id="servicios-menu">
        <div class="slider">								
            <a href="<?php bloginfo( 'url' ); ?>/personas" class="mrt-page-link slider-cell <?php if( is_page( 'personas' ) ) : echo ' active'; endif; ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-personas.svg">
                <h1 class="condensed">Personas</h1>
            </a>
            <a href="<?php bloginfo( 'url' ); ?>/procesos" class="mrt-page-link slider-cell <?php if( is_page( 'procesos' ) ) : echo ' active'; endif; ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-procesos.svg">
                <h1 class="condensed">Procesos</h1>
            </a>
            <a href="<?php bloginfo( 'url' ); ?>/prioridades" class="mrt-page-link slider-cell <?php if( is_page( 'prioridades' ) ) : echo ' active'; endif; ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-prioridades.svg">
                <h1 class="condensed">Prioridades</h1>
            </a>
        </div>
</section>
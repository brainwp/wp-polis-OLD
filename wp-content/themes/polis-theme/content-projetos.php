<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/07/14
 * Time: 14:14
 */
?>
<div class="col-md-12 post_content">
    <div class="col-md-3 col-xs-12 pull-left thumb">
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'medium' );
        } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/default-projetos.jpg" alt="<?php the_title(); ?>" />
        <?php } ?>
    </div>
    <div class="col-md-6 post">
        <span class="cat">Projeto</span>
        <a class="link" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <span class="text">
                                <?php echo resumo(); ?>
                            </span>
        <a class="leia" href="<?php the_permalink(); ?>">Leia Mais</a>
    </div>
    <div class="col-md-3">
        <a href="<?php the_permalink(); ?>" class="detalhes">Detalhes do Projeto</a>

        <div class="col-lg-12 clear"></div>
        <aside class="equipe">
            <div class="top">
                Equipe
                <a href="<?php the_permalink(); ?>#equipe_todos">[ver todos]</a>
            </div>
            <ul>
                <?php if (get_field('projetos_repeater')): ?>
                    <?php while (has_sub_field('projetos_repeater')): ?>
                        <li><a><?php the_sub_field('projetos_nome'); ?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </aside>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/07/14
 * Time: 09:41
 */
get_header();?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main projetos-main" role="main">
            <div class="header-area col-md-12">
                <h1>Projetos</h1>
            </div>
            <div class="posts_container">
                <div class="tabContaier">
                    <ul>
                        <li>
                            <a class="active" href="#tab1"><span>Com Parceiros</span></a>
                            <a href="#tab2"><span>De Assesoria</span></a>
                        </li>
                    </ul>
                </div>
                <section class="col-md-12 tabDetails atividades">
                    <div id="tab1" class="tabContents aba-area">
                        <?php // aqui vai o loop ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                        <?php get_template_part('content', 'projetos'); ?>
                    </div>
                    <div class="container pagination">
                        <div class="col-md-4 col-md-offset-4">
                            <a href="#">&lt;</a>
                            <a href="#">1</a>
                            <a class="atual" href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">&gt;</a>
                        </div>
                    </div>
                    <div id="tab2" class="tabContents aba-area">
                        teste2
                    </div>
                </section>
            </div>
        </main>
    </div>
<?php get_footer(); ?>
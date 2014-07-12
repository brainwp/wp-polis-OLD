<?php
require get_template_directory() . '/inc/advanced-custom-fields/acf.php';
add_action('acf/register_fields', 'my_register_fields');
function my_register_fields()
{
    include_once(get_template_directory() . '/inc/acf-repeater/repeater.php');
}

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_area',
        'title' => 'Area',
        'fields' => array(
            array(
                'key' => 'field_53862949d369c',
                'label' => 'Area',
                'name' => 'area',
                'type' => 'select',
                'required' => 1,
                'choices' => '',
                'default_value' => 'Institucional',
                'allow_null' => 0,
                'multiple' => 0
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));

    register_field_group(array(
        'id' => 'acf_cargo',
        'title' => 'Cargo',
        'fields' => array(
            array(
                'key' => 'field_539f30f6f38bd',
                'label' => 'Cargo',
                'name' => 'cargo',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
    register_field_group(array(
        'id' => 'acf_e-privado-se-ativado-somente-membros-logados-poderao-ver',
        'title' => 'É privado? (Se ativado somente membros logados poderão ver)',
        'fields' => array(
            array(
                'key' => 'field_538dcab58cb92',
                'label' => 'Selecione:',
                'name' => 'isprivate',
                'type' => 'select',
                'choices' => array(
                    'nao' => 'Não',
                    'sim' => 'Sim'
                ),
                'default_value' => '',
                'allow_null' => 0,
                'multiple' => 0
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_media',
                    'operator' => '!=',
                    'value' => 'all',
                    'order_no' => 1,
                    'group_no' => 0
                ),
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
    register_field_group(array(
        'id' => 'acf_e-mail',
        'title' => 'E-mail',
        'fields' => array(
            array(
                'key' => 'field_539f3a8e3ca5f',
                'label' => 'E-mail (Publico)',
                'name' => 'email',
                'type' => 'email',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
    register_field_group(array(
        'id' => 'acf_links-relacionados',
        'title' => 'Links Relacionados',
        'fields' => array(
            array(
                'key' => 'field_539f3f9eff50c',
                'label' => 'Links Relacionados',
                'name' => 'links_user',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_539f40a5ff50e',
                        'label' => 'Descrição do link',
                        'name' => 'texto_url',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_539f48aea3917',
                        'label' => 'Endereco',
                        'name' => 'endereco_user_link',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => ''
                    )
                ),
                'row_min' => 1,
                'row_limit' => 99999,
                'layout' => 'table',
                'button_label' => 'Adicionar mais um campo'
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
    register_field_group(array(
        'id' => 'acf_telefone',
        'title' => 'Telefone',
        'fields' => array(
            array(
                'key' => 'field_539f389861172',
                'label' => 'Telefone',
                'name' => 'telefone',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
    register_field_group(array(
        'id' => 'acf_twitter',
        'title' => 'Twitter',
        'fields' => array(
            array(
                'key' => 'field_539f3a0eef24b',
                'label' => 'Twitter',
                'name' => 'twitter',
                'type' => 'text',
                'instructions' => 'Digite somente o nome de usuário, sem @',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'ef_user',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_tipo-de-publicacao',
        'title' => 'Tipo de Publicação',
        'fields' => array(
            array(
                'key' => 'field_53b1c1d1453d3',
                'label' => 'Isso é',
                'name' => 'publicacoes_qual_tipo',
                'type' => 'radio',
                'required' => 1,
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'choices' => array(
                    'biblioteca' => 'Biblioteca',
                    'arquivistica' => 'Docmentação Arquivística'
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical'
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'publicacoes',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));
}
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_publicacoes',
        'title' => 'Publicações',
        'fields' => array(
            array(
                'key' => 'field_538f2564122f9',
                'label' => 'Arquivo para Download',
                'name' => 'publicacoes_download',
                'type' => 'file',
                'instructions' => 'Adicione a Publicação para download',
                'save_format' => 'id',
                'library' => 'all'
            ),
            array(
                'key' => 'field_53ac790835733',
                'label' => 'Link Externo',
                'name' => 'publicacoes_link_externo',
                'type' => 'text',
                'instructions' => 'Adicione um externo link para algo relacionado a essa Publicação.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                            'value' => ''
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_53ac797a35734',
                'label' => 'ISBN',
                'name' => 'publicacoes_isbn',
                'type' => 'number',
                'instructions' => 'Adicione o registro ISBN dessa Publicação (quando houver).',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                            'value' => ''
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => ''
            ),
            array(
                'key' => 'field_53ac79c035735',
                'label' => 'ISSN',
                'name' => 'publicacoes_issn',
                'type' => 'number',
                'instructions' => 'Adicione o registro ISSN dessa Publicação (quando houver).',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53b1c1d1453d3',
                            'operator' => '==',
                            'value' => 'arquivistiva'
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => ''
            ),
            array(
                'key' => 'field_53ac7a0b35736',
                'label' => 'Fonte',
                'name' => 'publicacoes_fonte',
                'type' => 'text',
                'instructions' => 'Adicione a fonte da Publicação (quando houver).',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                            'value' => ''
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_53b1bd7f220c9',
                'label' => 'Formato',
                'name' => 'publicacoes_formato',
                'type' => 'radio',
                'instructions' => 'Marque aqui a extensão do arquivo anexo.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'choices' => array(
                    '.pdf' => '.pdf',
                    '.jpg' => '.jpg',
                    '.gif' => '.gif',
                    '.png' => '.png',
                    '.avi' => '.avi',
                    '.wma' => '.wma',
                    '.wmv' => '.wmv',
                    '.mp3' => '.mp3',
                    '.mp4' => '.mp4'
                ),
                'other_choice' => 1,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal'
            ),
            array(
                'key' => 'field_539b1c5b69a1a',
                'label' => 'Número de Páginas',
                'name' => 'publicacoes_paginas',
                'type' => 'text',
                'instructions' => 'Adicione a quantidade de páginas dessa publicação (quando houver)',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53b1bd7f220c9',
                            'operator' => '==',
                            'value' => '.pdf'
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => 'Número de Páginas',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_539b1c1b69a19',
                'label' => 'Ano de Publicação',
                'name' => 'publicacoes_ano',
                'type' => 'text',
                'instructions' => 'Adicione o ano de publicação',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => 'Ano de Publicação',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => 4
            ),
            array(
                'key' => 'field_53bbffe321138',
                'label' => 'Idioma',
                'name' => 'publicacoes_idioma',
                'type' => 'select',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array(
                    'Português' => 'Português',
                    'Alemão' => 'Alemão',
                    'Espanhol' => 'Espanhol',
                    'Inglês' => 'Inglês',
                ),
                'default_value' => 'Português',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_53bbfc6b2112e',
                'label' => 'Série',
                'name' => 'publicacoes_serie',
                'type' => 'text',
                'instructions' => 'Adicione o número da Série.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53b1c1d1453d3',
                            'operator' => '==',
                            'value' => 'arquivistica'
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfd842112f',
                'label' => 'SubSérie',
                'name' => 'publicacoes_subserie',
                'type' => 'text',
                'instructions' => 'Adicione o número da SubSérie.',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'field_53b1c1d1453d3',
                            'operator' => '==',
                            'value' => 'arquivistica'
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfd9321130',
                'label' => 'Unidade de Armazenamento',
                'name' => 'publicacoes_armazenamento',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfdaf21131',
                'label' => 'Tombo (Número do Documento)',
                'name' => 'publicacoes_tombo',
                'type' => 'number',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_53bbfdd221132',
                'label' => 'Fase do Arquivo',
                'name' => 'publicacoes_fase',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfde521133',
                'label' => 'Data',
                'name' => 'publicacoes_data',
                'type' => 'date_picker',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'date_format' => 'yyyy-mm-dd',
                'display_format' => 'dd/mm/yyyy',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_53bbfe4721134',
                'label' => 'Fonte',
                'name' => 'publicacoes_fonte',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfe9121135',
                'label' => 'Referência',
                'name' => 'publicacoes_referência',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbfeb921136',
                'label' => 'Link Externo',
                'name' => 'publicacoes_link_externo',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_53bbff9421137',
                'label' => 'Situação do Documento',
                'name' => 'publicacoes_situacao',
                'type' => 'text',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '==',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'publicacoes',
                    'order_no' => 1,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array()
        ),
        'menu_order' => 1
    ));
    register_field_group(array(
        'id' => 'acf_campos-migracao',
        'title' => 'Campos Migração',
        'fields' => array(
            array(
                'key' => 'field_539b9c0acfc0f',
                'label' => 'Data de Publicação',
                'name' => 'mgr_data',
                'type' => 'text',
                'instructions' => 'Valor do campo nwd_date',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_539b8c17ddbb2',
                'label' => 'Imagem',
                'name' => 'mgr_imagem',
                'type' => 'text',
                'instructions' => 'Valor do campo nwd_image',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_539b8d6addbb3',
                'label' => 'Fonte',
                'name' => 'mgr_fonte',
                'type' => 'text',
                'instructions' => 'Valor do campo nwd_source',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_539b92e8ddbb4',
                'label' => 'Link Externo',
                'name' => 'mgr_link_externo',
                'type' => 'text',
                'instructions' => 'Valor do campo nwd_external_link',
                'conditional_logic' => array(
                    'status' => 1,
                    'rules' => array(
                        array(
                            'field' => 'null',
                            'operator' => '=='
                        )
                    ),
                    'allorany' => 'all'
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_539b9308ddbb5',
                'label' => 'Autor',
                'name' => 'mgr_autor',
                'type' => 'text',
                'instructions' => 'Valor do campo nwd_author',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'noticias',
                    'order_no' => 0,
                    'group_no' => 0
                )
            )
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array()
        ),
        'menu_order' => 0
    ));

}
//Avatar field
if (function_exists("register_field_group")) {
    register_field_group(array('id' => 'acf_avatar', 'title' => 'Avatar', 'fields' => array(array('key' => 'field_53a9927815518', 'label' => 'Avatar', 'name' => 'user_avatar', 'type' => 'image', 'save_format' => 'id', 'preview_size' => 'thumbnail', 'library' => 'all',),), 'location' => array(array(array('param' => 'ef_user', 'operator' => '==', 'value' => 'all', 'order_no' => 0, 'group_no' => 0,),),), 'options' => array('position' => 'normal', 'layout' => 'no_box', 'hide_on_screen' => array(),), 'menu_order' => 0,));
}

function select_user_area($field){
    //democracia e participacao
    $_id = get_term_by('slug', 'democracia-e-participacao', 'areas');
    $_id = $_id->term_id;
    $_areas['democracia'] = 'Democracia e Participação';
    $field['choices'] = array();

    $args = array(
        'child_of' => $_id,
        'taxonomy' => 'areas',
        'hide_empty' => 0,
    );

    $categories = get_categories($args);
    foreach ($categories as $category) {
        $_areas[$category->slug] = '   -- ' . $category->cat_name;
    }
    //inclusao-e-sustentabilidade
    $_id = get_term_by('slug', 'inclusao-e-sustentabilidade', 'areas');
    $_id = $_id->term_id;
    $_areas['inclusao'] = 'Inclusão e sustentabilidade';

    $args = array(
        'child_of' => $_id,
        'taxonomy' => 'areas',
        'hide_empty' => 0,
    );

    $categories = get_categories($args);
    foreach ($categories as $category) {
        $_areas[$category->slug] = '   -- ' . $category->name;
    }
    //reforma urbana
    $_id = get_term_by('slug', 'reforma-urbana', 'areas');
    $_id = $_id->term_id;
    $_areas['reforma'] = 'Reforma Urbana';

    $args = array(
        'child_of' => $_id,
        'taxonomy' => 'areas',
        'hide_empty' => 0,
    );

    $categories = get_categories($args);
    foreach ($categories as $category) {
        $_areas[$category->slug] = '   -- ' . $category->name;
    }
    //cidadania cultural
    $_id = get_term_by('slug', 'cidadania-cultural', 'areas');
    $_id = $_id->term_id;
    $_areas['cidadania'] = 'Cidadania Cultural';

    $args = array(
        'child_of' => $_id,
        'taxonomy' => 'areas',
        'hide_empty' => 0,

    );
    $categories = get_categories($args);
    foreach ($categories as $category) {
        $_areas[$category->slug] = '   -- ' . $category->name;
    }
    $_areas['Outro'] = 'Outro';
    $_areas['Institucional'] = 'Institucional';
    $field['choices'] = $_areas;
    return $field;
}

// v4.0.0 and above
add_filter('acf/load_field/name=area', 'select_user_area');
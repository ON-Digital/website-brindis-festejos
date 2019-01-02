<?php
  /*
  Plugin Name: Menu Festejos
  Plugin URI: http://example.com/
  Description: Plugin para menu de festejos
  Version: 1.0
  Author: On Digital
  Author URI: http://example.com/
  */

  /**
   * Copyright (c) `date "+%Y"` . All rights reserved.
   *
   * Released under the GPL license
   * http://www.opensource.org/licenses/gpl-license.php
   *
   * This is an add-on for WordPress
   * http://wordpress.org/
   *
   * **********************************************************************
   * This program is free software; you can redistribute it and/or modify
   * it under the terms of the GNU General Public License as published by
   * the Free Software Foundation; either version 2 of the License, or
   * (at your option) any later version.
   *
   * This program is distributed in the hope that it will be useful,
   * but WITHOUT ANY WARRANTY; without even the implied warranty of
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   * GNU General Public License for more details.
   * **********************************************************************
   */

   // Disable access from outside wordpress
  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  require_once( __DIR__ . '/includes/class-feme-frontend.php' );

   /**
    *
    */
   class Menu_Festejos
   {

     private static $instance = null;

     private function __construct()
     {
       // code...
     }

     public static function feme_get_instance()
     {
       if ( is_null( self::$instance ) ) {

         self::$instance = new self;
       }

       return self::$instance;
     }

     public function feme_setup()
     {

        add_action( 'init', array( $this, 'feme_register_taxonomies' ) );

        add_action( 'init', array( $this, 'feme_register_postype' ) );

     }

     public function feme_register_postype()
     {
       /**
        * Labels collection for the 'labels' argument
        *
        * @var array $labels
        */
       $labels = array(
           'name' => __( 'Productos', 'fe-me' ),
           'singular_name' => __( 'Producto', 'fe-me' ),
           'add_new' => __( 'Añadir nuevo producto', 'fe-me' ),
           'add_new_item' => __( 'Añadir nuevo producto', 'fe-me' ),
           'edit' => __( 'Editar', 'fe-me' ),
           'edit_item' => __( 'Editar producto', 'fe-me' ),
           'new_item' => __( 'Nuevo producto', 'fe-me' ),
           'view' => __( 'Ver producto', 'fe-me' ),
           'view_item' => __( 'Ver producto', 'fe-me' ),
           'search items' => __( 'Buscar productos', 'fe-me' ),
           'not_found' => __( 'Ningun producto encontrado', 'fe-me' ),
           'not_found_in_trash' => __( 'No hay productos en la papelera', 'fe-me' ),
       );

       /**
        * Arguments for the 'register_post_type' function
        *
        * @var array $args
        */
       $args = array(
           'labels' => $labels,
           'hierarchical' => false,
           'description' => __( 'Informa de tus productos y servicios' , 'fe-me' ),
           'public' => true,
           'menu_position' => 20,
           'menu_icon' => 'dashicons-format-gallery',
           'has_archive' => 'fe-productos',
           'rewrite_rules' => array( 'slug' => 'fe-productos', 'with_front' => false ),
           'supports' => array( 'title', 'editor', 'thumbnail' ),
       );

       register_post_type( 'feme_productos', $args );
     }

     public function feme_register_taxonomies()
     {
       /**
         * Custom labels for our new 'category_gallery' taxonomy
         *
         * @var array $labels_cat_taxonomy
         */
         $labels_cat_taxonomy = array(
           'name' => _X( 'Categorias', 'taxonomy general name', 'fe-me' ),
           'singular_name' => _X( 'Categoria', 'taxonomy singular name', 'fe-me' ),
           'search_items' => __( 'Buscar categorias', 'fe-me' ),
           'popular_items' => __( 'Categorias populares', 'fe-me' ),
           'all_items' => __( 'Todas las categorias', 'fe-me' ),
           'edit_item' => __( 'Editar categoria', 'fe-me' ),
           'update_item' => __( 'Actualizar categoria', 'fe-me' ),
           'not_found' => __( 'No se encontraron categorias', 'fe-me' ),
           'not_found_in_trash' => __( 'No hay categorias en la papelera', 'fe-me' ),
           'add_new_item' => __( 'Agregar nueva categoria', 'fe-me' ),
           'new_item_name' => __( 'Nuevo nombre de categoria', 'fe-me' ),
           'menu_name' => __( 'Categorias', 'fe-me' ),
         );

         /**
          * Array arguments for our new 'category_gallery' taxonomy
          *
          * @var array $cat_args
          */
         $cat_args = array(
           'labels' => $labels_cat_taxonomy,
           'hierarchical' => true,
           'description' => __( 'Clasifica tus productos por categorias', 'fe-me' ),
           'rewrite' => array( 'slug' => 'feme-categoria', 'with_front' => false ),
         );

         // register taxonomy
         register_taxonomy( 'feme-categoria', 'feme_productos', $cat_args );
         register_taxonomy_for_object_type( 'feme-categoria', 'feme_productos' );
     }


   }

   add_action( 'plugins_loaded', array( Menu_Festejos::feme_get_instance() , 'feme_setup' ) );

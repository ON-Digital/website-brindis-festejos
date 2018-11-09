<?php
/**
* Archive index posts template to show them by tag
*
* @package Dwarf theme
* @since Dwarf theme 1.0
*/

  get_header();
?>

<div class="container-fluid">
  <div class="row">
    <h1 class="text-center w-100">
      <?php
        single_tag_title();
      ?>
    </h1>
  </div>

  <?php
    dwf_regular_taxonomies_content();
  ?>
</div>
<?php
  get_footer();

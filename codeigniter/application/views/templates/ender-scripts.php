<!-- Custom scripts for different pages -->

    <?php if (is_array($js_to_load)) { ?>
    <?php foreach ($js_to_load as $row) { ?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/<?php echo $row; ?>"></script>
      <?php }
          } ?>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.12.4.min.js"></script>
  	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.bootpag.min.js"></script>

    <?php if (is_array($js_to_load)) : ?>
    <?php foreach ($js_to_load as $row): ?>
        <script type="text/javascript" src="assets/js/<?php echo $row; ?>"></script>
    <?php endforeach; ?>
    <?php endif; ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

        <script src="<?php echo base_url();?>assets/js/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/masonry.pkgd.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/search_form.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.bootpag.min.js"></script>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>

        <script type="text/javascript">
        $('.grid').masonry({
          // set itemSelector so .grid-sizer is not used in layout
          itemSelector: '.grid-item',
          // use element for option
          columnWidth: '.grid-sizer',
          percentPosition: true
          })
        </script>

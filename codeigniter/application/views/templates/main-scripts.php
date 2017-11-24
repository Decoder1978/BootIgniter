<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

        <script src="<?= base_url();?>assets/js/jquery-1.12.4.min.js"></script>
        <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets/js/form_styling.js"></script>
        <script src="<?= base_url();?>assets/js/search_form.js"></script>
        <script src="<?= base_url();?>assets/js/jquery.bootpag.min.js"></script>
        <script src="<?= base_url();?>assets/js/masonry.pkgd.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?= base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>

        <script type="text/javascript">
        $('[data-toggle="collapse"]').on('click', function() {
            var $this = $(this),
                    $parent = typeof $this.data('parent')!== 'undefined' ? $($this.data('parent')) : undefined;
            if($parent === undefined) { /* Just toggle my  */
                $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                return true;
            }

            /* Open element will be close if parent !== undefined */
            var currentIcon = $this.find('.glyphicon');
            currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
            $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');
          });
        </script>

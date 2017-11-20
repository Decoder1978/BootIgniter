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
        $('.grid').masonry({
          itemSelector: '.grid-item',
          // use element for option
          columnWidth: '.grid-sizer',
          fitWidth: true
        });
        $('.grid-item').hover(function () {
        $(this).children('img').stop().animate({
            opacity: .4
        }, 200);
        $(this).children('.mas_title').show(500);
    }, function () {
        $(this).children('img').stop().animate({
            opacity: 1
        }, 500);
        $(this).children('.mas_title').hide(500);
    });
        </script>

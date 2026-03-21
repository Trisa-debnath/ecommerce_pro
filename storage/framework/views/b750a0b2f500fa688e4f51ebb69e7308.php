 <script src="<?php echo e(asset('admin/plugins/Jquery/dist/jquery.min.js')); ?>"></script>
   <script src="<?php echo e(asset('admin/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
   <script src="<?php echo e(asset('admin/plugins/tether/dist/js/tether.min.js')); ?>"></script>

   <!-- Required Fremwork -->
   <script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

   <!-- Scrollbar JS-->
   <script src="<?php echo e(asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
   <script src="<?php echo e(asset('admin/plugins/jquery.nicescroll/jquery.nicescroll.min.js')); ?>"></script>

   <!--classic JS-->
   <script src="<?php echo e(asset('admin/plugins/classie/classie.js')); ?>"></script>

   <!-- notification -->
   <script src="<?php echo e(asset('admin/plugins/notification/js/bootstrap-growl.min.js')); ?>"></script>

   <!-- Sparkline charts -->
   <script src="<?php echo e(asset('admin/plugins/jquery-sparkline/dist/jquery.sparkline.js')); ?>"></script>

   <!-- Counter js  -->
   <script src="<?php echo e(asset('admin/plugins/waypoints/jquery.waypoints.min.js')); ?>"></script>
   <script src="<?php echo e(asset('admin/plugins/countdown/js/jquery.counterup.js')); ?>"></script>

 <!-- Echart js -->


   <!--
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->

   <!-- custom js -->
   <script type="text/javascript" src="<?php echo e(asset('admin/js/main.min.js')); ?>"></script>
   <script type="text/javascript" src="<?php echo e(asset('admin/pages/dashboard.js')); ?>"></script>
   <script type="text/javascript" src="<?php echo e(asset('admin/pages/elements.js')); ?>"></script>
   <script src="<?php echo e(asset('admin/js/menu.min.js')); ?>"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>
<?php /**PATH D:\ecommerce_pro\resources\views/admin/script.blade.php ENDPATH**/ ?>
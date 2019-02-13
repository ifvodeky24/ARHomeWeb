<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'AdminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        'AdminLTE/bower_components/Ionicons/css/ionicons.min.css',
        'AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.css',
        'AdminLTE/dist/css/AdminLTE.min.css',
        'AdminLTE/dist/css/skins/_all-skins.min.css',
        'AdminLTE/bower_components/morris.js/morris.css',
        'AdminLTE/bower_components/jvectormap/jquery-jvectormap.css',
        'AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'AdminLTE/plugins/iCheck/all.css',
        'AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
        'AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css',
        'AdminLTE/bower_components/select2/dist/css/select2.min.css',

    ];
    public $js = [
      'AdminLTE/bower_components/jquery/dist/jquery.min.js',
      'AdminLTE/bower_components/jquery-ui/jquery-ui.min.js',
      'AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
      'AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js',
      'AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
      'AdminLTE/bower_components/raphael/raphael.min.js',
      'AdminLTE/bower_components/morris.js/morris.min.js',
      'AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
      'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
      'AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
      'AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js',
      'AdminLTE/bower_components/moment/min/moment.min.js',
      'AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js',
      'AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
      'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
      'AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
      'AdminLTE/bower_components/fastclick/lib/fastclick.js',
      'AdminLTE/dist/js/adminlte.min.js',
      'AdminLTE/dist/js/pages/dashboard.js',
      'AdminLTE/dist/js/demo.js',
      'AdminLTE/bower_components/select2/dist/js/select2.full.min.js',
      'AdminLTE/plugins/input-mask/jquery.inputmask.js',
      'AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js',
      'AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js',
      'AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
      'AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js',
      'AdminLTE/plugins/iCheck/icheck.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

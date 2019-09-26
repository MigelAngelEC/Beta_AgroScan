<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123072858-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-123072858-1');
  </script>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximumscale=1.0, user-scalable=no" />
  <title>AGROCLOUD - Tu cultivo en la nube</title>
  <link rel="shortcut icon" href="<?php echo base_url();?>_assets/img/agrocloud.ico" type="image/vnd.microsoft.icon">

  <!--mapa-->
  <script src="https://cdn3.devexpress.com/jslib/19.1.6/js/dx.all.js"></script>
  <script src="<?php echo base_url();?>_assets/plantilla/dist/js/marker/marker.js"></script>
  <script >
      $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>_assets/plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>_assets/plantilla/dist/css/adminlte.min.css">
  <!-- iconosplantilla -->
  <link rel="shortcut icon" href="<?php echo base_url();?>_assets/plantilla/dist/img/avatar.png" type="image/vnd.microsoft.icon">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 -->
  <script src="<?= base_url()?>_assets/plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url()?>_assets/plantilla/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url()?>_assets/plantilla/dist/js/demo.js"></script>


  <!-- fin Referencia de plantilla-->


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDZqQIEyDlpqcYQ79AqZA9vt9-LnRzWZ0" async defer>
  </script>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
    integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous">
  </script>
  <!-- FireBase -->
  <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-storage.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-messaging.js"></script>
  <!-- Popper JS  -->
  <script src="<?php echo base_url();?>_assets/js/popper.min.js"></script>
  <!-- BootBox JS -->
  <script src="<?php echo base_url();?>_assets/js/bootbox.min.js"></script>
  <script src="<?php echo base_url();?>_assets/js/bootbox.locales.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>_assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url();?>_assets/css/mdb.min.css" rel="stylesheet">
  <!-- Style Icon Weathers -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>_assets/css/weather-icons-wind.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>_assets/css/weather-icons-wind.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>_assets/css/weather-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>_assets/css/weather-icons.min.css">
  <!-- Styles agro -->
  <link href="<?php echo base_url();?>_assets/css/agroStyle.css" rel="stylesheet">
  <!--  styles leaflet-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script src="<?php echo base_url();?>_assets/js/_map_js/leaflet.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>_assets/css/_map_css/mouse.position/mousePosition.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>_assets/css/_map_css/measure/measure.css">
  <link rel="stylesheet" href="<?php echo base_url();?>_assets/css/_map_css/geoLocation/locate.min.css" />
  <!-- hoja estilo legend -->
  <link rel="stylesheet" href="<?php echo base_url();?>_assets/css/_map_css/legend/L.Control.HtmlLegend.css" />
  <!-- Escalas -->
  <link rel="stylesheet" type="text/css"
    href="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.css">
  <!--  styles draw.pm-->
  <link rel="stylesheet" href="<?php echo base_url();?>_assets/css/_map_css/leaflet.pm/leaflet.pm.css" />
  <!--  toastr-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123072858-1"></script>
  <!-- Highcharts-->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-123072858-1');
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<script>
  $("#sliderp").click();
</script>
<img id='loading' style="display:none" ; />
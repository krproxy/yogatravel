<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 20.04.16
 * Time: 17:38
 */ ?>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<script src="/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone-amd-module.js"></script>

<!-- fotorama.css & fotorama.js. -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<script src="{{asset("/js/bootstrap-switch.min.js")}}"></script> <!-- 16 KB -->

<script>
    $("[id='my-checkbox']").bootstrapSwitch();
</script>

@if(session()->has('customModalMessage'))
    @include('modals.customModal', ['customModalMessage' => session()->pull('customModalMessage')])

    <script type="text/javascript">
        $(document).ready(function () {
            $('#customModal').modal('show');
        });
    </script>
@endif
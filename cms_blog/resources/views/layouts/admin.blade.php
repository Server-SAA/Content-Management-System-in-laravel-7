<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="{{asset("css/admin.app.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("css/admin.css")}}">
    </head>
    <body>
        <div id="wrapper">

        <!-- Navigation -->
            @include("admin.inc.nav")

            <div id="page-wrapper">

                <div class="container-fluid">
                @include("inc.messages")
                <!-- Page Heading -->
                    <div class="row">
                        @yield("Admin-Content")
                    </div>
                <!-- /.row -->

                </div>
            <!-- /.container-fluid -->

            </div>
        <!-- /#page-wrapper -->

        </div>
    </body>
    <script type="text/javascript" src="{{asset("js/admin.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/jquery.validate.js")}}"></script>
    <script>
        $( "#add_form" ).dialog({
            autoOpen: false,
            width: 400,
            buttons: [
                {
                    text: "Ok",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                },
                {
                    text: "Cancel",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                }
            ]
        });

        $( "#open-form" ).click(function( event ) {
            $( "#add_form" ).dialog( "open" );
            event.preventDefault();
        });
    </script>
</html>

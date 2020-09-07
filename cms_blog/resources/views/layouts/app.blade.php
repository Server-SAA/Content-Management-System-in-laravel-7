<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
    </head>
    <body>
        @include("blog.inc.nav")
        <div class="container-fluid">
            @include("inc.messages")
            <div class="row">
                @yield("Main-Content")
                @include("blog.inc.sidebar")
            </div>
            {{csrf_field()}}
        </div>
        <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".search").keyup(function(){
                        var query = $(this).val();
                        if (query != ""){
                            var _token = $("input[name='_token']").val();
                            $.ajax({
                                url:"/searching",
                                method:"post",
                                data:{
                                    query:query,
                                    _token:_token
                                },
                                success:function(data){
                                    $(".form-data").fadeIn();
                                    $(".form-data").html(data);
                                }
                            });
                        }
                    });

                $(".search-items").on("click", function(){
                    alert($(this).val())
                });
                });
        </script>
    </body>
</html>

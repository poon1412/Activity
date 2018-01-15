<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:image" content="https://cdn-images-1.medium.com/max/2000/1*trOZJzNWOEyh79Y1od6W-Q.png">
        <meta property="og:image:type" content="image/jpeg">
        <!-- <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200"> -->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/navcss/nav.css') }}
        {{ stylesheet_link('css/home/home.css') }}
        {{ stylesheet_link('css/card/card.css') }}
        {{ stylesheet_link('css/login/login.css') }}
        {{ stylesheet_link('css/login/login.css') }}
        {{ stylesheet_link('css/ct-nav/pe-icon-7-stroke.css') }}
        {{ stylesheet_link('css/table/table.css') }}
        {{ stylesheet_link('css/aclist/aclist.css') }}
        {{ stylesheet_link('css/PanelsList/panelslist.css') }}
        <title>Phalcon PHP Framework</title>
    </head>
    <body>


        <div class="">
            {{ content() }}

        </div>
        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/login.js') }}
        {{ javascript_include('js/table2.js') }}

      

    </body>


</html>

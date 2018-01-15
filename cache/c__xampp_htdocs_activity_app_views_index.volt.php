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
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/navcss/nav.css') ?>
        <?= $this->tag->stylesheetLink('css/home/home.css') ?>
        <?= $this->tag->stylesheetLink('css/card/card.css') ?>
        <?= $this->tag->stylesheetLink('css/login/login.css') ?>
        <?= $this->tag->stylesheetLink('css/login/login.css') ?>
        <?= $this->tag->stylesheetLink('css/ct-nav/pe-icon-7-stroke.css') ?>
        <?= $this->tag->stylesheetLink('css/table/table.css') ?>
        <?= $this->tag->stylesheetLink('css/aclist/aclist.css') ?>
        <?= $this->tag->stylesheetLink('css/PanelsList/panelslist.css') ?>
        <title>Phalcon PHP Framework</title>
    </head>
    <body>


        <div class="">
            <?= $this->getContent() ?>

        </div>
        <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
        <?= $this->tag->javascriptInclude('js/login.js') ?>
        <?= $this->tag->javascriptInclude('js/table2.js') ?>

      

    </body>


</html>

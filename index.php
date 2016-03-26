<?php
require_once("classes/session.php");
require_once("classes/city.php");
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Weather Scraper</title>
    <link rel="stylesheet" href="assets/fonts/linecons/style.css">
    <link rel="stylesheet" href="assets/css/foundation.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css"/>
    <link rel="stylesheet" href="assets/css/core.css"/>
    <link href="assets/css/styles.css" rel="stylesheet" media="all">
    <link href='https://fonts.googleapis.com/css?family=Orbitron:400,500,700,900|Quantico:400,700' rel='stylesheet'
          type='text/css'>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<body>
<div id="container">
    <div class="container">

        <div id="language" class="language">
            <span id="de" class="is-active">de</span>
            <span id="en">en</span>
        </div>
        <?php
        include("templates/welcome_message.php");

        include("templates/city_input.php");

        ?>
        <div id="preloader"></div>

        <?php

        include("templates/weather_output.php");

        ?>

    </div>
</div>
</body>
</html>
<script src="assets/js/vendor/what-input.min.js"></script>
<script src="assets/js/foundation.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $('#language').find('span').bind('click', getSpanId);

    function getSpanId() {
        var spanId = ($(this).attr('id'));
    }

    $("input#location").click(function () {
        $(".container-output").fadeOut(2000);
    });

    $('#findweather').click(function (event) {
        $('input#location').attr("placeholder", ".. Daten werden gesucht").val("").focus().blur();
        showWeather();
        event.preventDefault();
    });

    $(document).ready(function () {
        $('#container').css("visibility", "visible").fadeIn('slow');
        $('.container-welcome').css("padding-top", "23%");
        setTimeout(function () {
            $('.container-input').css('opacity', "1");
        }, 1500);

    });

    function xhrSuccess() {
        this.callback.apply(this, this.arguments);
    }

    function xhrError() {
        console.error(this.statusText);
    }

    function getUrlInfo(url, parameter, pass, callback) {
        var xhr = new XMLHttpRequest();
        console.log("passed " + pass);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (typeof callback == 'function') {
                    callback({'response': xhr.responseXML, 'passed_values': pass});
                }
            }
        };
        xhr.open("post", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(parameter);
    }


    function showWeather() {
        if ((document.getElementById("location")).length == 0) {

            //todo if error ......
            document.getElementById("message").innerHTML = "nix";

            return;
        }

        getUrlInfo("http://devweatherscraper/scraping.php", "location=" + document.getElementById('location').value, "", splitTags);

//        document.getElementById("preloader").innerHTML ="<img src='assets/images/316.gif'>";


        document.getElementById("preloader").innerHTML = "";
        $(".container-output").fadeIn('slow');
        $("input#location").attr("placeholder", "Bitte einen Ort eingeben..").val("").focus().blur();
    }


    function splitTags(text) {

        console.log(text['response']);
        console.log(text['passed_values']);
        var tags = text['response'].getElementsByTagName("result")[0].childNodes;


        for (var j = 0; j < tags.length; j++) {
//            var tagname = tags[j].tagName;
//            var tagcontent = tags[j].innerHTML;


            getUrlInfo("assets/languages/weather_translation.xml", "", tags[j], translate);
        }

    }


    function translate(response) {
        var dictionary = response['response'];
        var tagname = response['passed_values'].tagName;
        var tagcontent = response['passed_values'].innerHTML;

        var items = $("item", dictionary);

        for (var i = 0; i < items.length; i++) {
            englisch = items[i].id;
            german = items[i].childNodes[0].nextSibling.innerHTML;

            var engl = new RegExp('\(\^\|\\b' + englisch + '\\b\)\(\?=\[\\s\)\,\.\-\]\)', 'gi');
            // var engl=new RegExp(^|\bheavy\b)(?=[\s,.-])
            //var engl = new RegExp('/\\b'+englisch+'\\b','gi');


            tagcontent = tagcontent.replace(engl, german);
            tagcontent = tagcontent.replace("  ", " ");

        }
        document.getElementById(tagname).innerHTML = tagcontent;
    }


    $(".container-output").hide();

    $(document).foundation();
</script>




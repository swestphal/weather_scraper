var placeholder = null;
var obj = {};

function parse_language(translate, varia) {

    $.getJSON('getsitetranslation.php', function (json) {
        $.each(json, function (i, item) {
            if (i == translate) {
                $.fn.delegateJSONResult(item, varia);
            }
        });
    });
}

$.fn.delegateJSONResult = function (item, varia) {
    obj[varia] = item;


};
//    function changeLanguage(xml) {
//        var new_language = xml['response'].getElementsByTagName('language')[0].innerHTML;
//
//        $('#language').find('span').removeClass('is-active');
//        $('#' + new_language).addClass('is-active');
//
//        location.reload(true);
//
//    }

function getSpanId() {
    var spanId = ($(this).attr('id'));
    $.get("setlanguage.php?language=" + spanId);
    $('#language').find('span').removeClass('is-active');
    $('#' + spanId).addClass('is-active');
    location.reload(true);
}

$("input#location").click(function () {
    $(".container-output").fadeOut(2000);
});


$('form').on('submit', function (event) {
    if ((document.getElementById("location")).length == 0) {

        //todo if error ......
        document.getElementById("message").innerHTML = "nix";

        return;
    } else {
        var location=$('input#location').val();
        $('input#location').attr("placeholder", obj['wait']).val("").focus().blur();
        console.log(location);
        showWeather(location);
        event.preventDefault();
        return false;
    }
})
;

$(document).ready(function () {

    $('#container').css("visibility", "visible").fadeIn('slow');
    $('.container-welcome').css("padding-top", "10%");
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


function showWeather(location) {
    if ((document.getElementById("location")).length == 0) {

        //todo if error ......
        document.getElementById("message").innerHTML = "nix";

        return;
    }

    getUrlInfo("scraping.php", "location=" + location, "", splitTags);

//        document.getElementById("preloader").innerHTML ="<img src='assets/images/316.gif'>";


    document.getElementById("preloader").innerHTML = "";

}


function splitTags(text) {

    var tags = text['response'].getElementsByTagName("result")[0].childNodes;

    if ($('#en').hasClass('is-active')) {
        var english = (text['response'].getElementsByTagName("city_selected_en")[0].innerHTML);
        $('span#city_location').text(english);
    } else {
        var german = (text['response'].getElementsByTagName("city_selected")[0].innerHTML);

        $('span#city_location').text(german);
    }

    for (var j = 0; j < tags.length; j++) {
//            var tagname = tags[j].tagName;
//            var tagcontent = tags[j].innerHTML;


        getUrlInfo("assets/languages/weather_translation.xml", "", tags[j], translate);
    }
    $(".container-output").fadeIn('slow');
    $("input#location").attr("placeholder", obj['input']).val("").focus().blur();
}


function translate(response) {
    var tagcontent = response['passed_values'].innerHTML;
    var tagname = response['passed_values'].tagName;

    if ($('#de').attr('class') == 'is-active') {

        var dictionary = response['response'];
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

    } else {
        console.log("englisch");

    }
    document.getElementById(tagname).innerHTML = tagcontent;
}

parse_language('FORECAST_WAIT', 'wait');

parse_language('INPUT_PLACEHOLDER', 'input');

$('#language').find('span').bind('click', getSpanId);
$(".container-output").hide();
$(document).foundation();
$(document).foundation('tab', 'reflow');

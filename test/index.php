<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
hello
</body>
</html>



    <script type=text/javascript>
        $.ajax({
            type: "GET",
            data: {
                invoiceno:jobid
            },
            url: "animalHandler.php",
            dataType: "html",
            async: false,
            success: function(data) {
                result=data;
            }
        });

</script>
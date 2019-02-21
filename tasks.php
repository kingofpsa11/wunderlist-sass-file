<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
</head>
<body>    
    <div>Content</div>
    <input type="text" name="" id="">
    <button>Hom nay</button>
    <script>
        $('button').click(function (e) { 
            e.preventDefault();
            console.log($('input').val())
            $.post("content.php", {task: $('input').val()},
            function (data, textStatus, jqXHR) {                
                $('div').text(data);
            },
            "text"
        );
        });
        
    </script>
</body>
</html>
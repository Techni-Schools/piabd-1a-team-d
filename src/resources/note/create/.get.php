<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/style.css">
    <link rel="stylesheet" href="/resources/css/reset.css">
    <title>Create note - SQNOTE</title>
</head>
<body>
<form action="/note/create" method="post">
    <p>Type in your note:</p>
    <textarea rows="100" cols="175" name="content"></textarea>
    <input type="text" placeholder="name" name="name">
    <input type="text" placeholder="temat" name="subject">
    <input type="submit" placeholder="Submit query">
</form>
</body>
</html>

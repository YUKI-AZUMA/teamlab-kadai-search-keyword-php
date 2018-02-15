<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>チームラボ選考課題</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 40px;
            background-image: url(speed2.jpg);
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }
        .form-keyword {
            max-width: 330px;
            padding: 15px;
            margin-top: 15%;
            margin-left: 37%;
          }
        .form-keyword .form-keyword-heading,
        .form-keyword .checkbox {
            margin-bottom: 10px;
            font-weight:bold;
            color: #ffffff;
        }
        .form-keyword .checkbox {
            font-weight: normal;
        }
        .form-keyword .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-keyword .form-control:focus {
            z-index: 2;
        }
        .form-keyword input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-keyword" action="page">
        <h2 class="form-keyword-heading">チームラボ選考課題</h2>
        <label for="keyword" class="sr-only">キーワード</label>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="キーワード" autofocus="true" />
        <br />
        <button class="btn btn-lg btn-block" type="submit">検索</button>
    </form>
</div>
</body>
</html>

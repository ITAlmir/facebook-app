<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="main">
    <div>
<h3>Choose image to upload...</h3><hr>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<form action="/upload" method="post" enctype="multipart/form-data">
@csrf
    <div class="upload">
        <input type="button" class="uploadButton" value="Browse" />
        <input type="file" name="image" accept="image/*" id="fileUpload" />
        <span class="fileName">Select file..</span>
    </div>
    <input type="submit" class="uploadButton" value="Upload File" /><br/><br/>
    <table class="uploadButton">
      <td>
      <a href="dashboard">Cancel</a>
      </td>
   </table>
</form><br>

</div>
</div>
</body>
</html>

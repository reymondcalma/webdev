<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Autocomplete search in PHP</title>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
<h2>AutoComplete Search In PHP MYSQL & jQuery</h2>
<br><br>

 <form method="post">
  <div class="autocomplete-container" style="width:300px;">
    <input  type="text" id="tutorial_name" name="tutorial_name" placeholder="tutorial name">
  </div>
</form>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
<script>
  $( function() {
    $( "#tutorial_name" ).autocomplete({
    source: 'backend-script.php'  
    });
});
</script>
</html>
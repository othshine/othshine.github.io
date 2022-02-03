<?php

session_start();

if(isset($_GET['logout'])){    
	
	//Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
	
	session_destroy();
	header("Location: index.php"); //Redirect the user
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}

function loginForm(){
    echo 
    '<div id="loginform">
    <p>Please enter your name to continue!</p>
    <form action="index.php" method="post">
      <label for="name">Name &mdash;</label>
      <input type="text" name="name" id="name" />
      <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
  </div>';
}

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Othmane's app</title>
  <link rel="manifest" href="/manifest.json">
  <style>
    .header		{position:fixed; top: 0px;  left: 0px; padding:0px; margin:0px; background:#6b6b6b; height:55px; width:100%; z-index:100}
    .center1 {margin: auto;width: 60%; border: 3px solid #04bd04;padding: 10px }
    .main { padding-top: 60px;-webkit-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;flex: 1; overflow-x: hidden; overflow-y: auto; -webkit-overflow-scrolling: touch; }
  </style>
</head>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<body>
  <header class="header">
    <h1> Othmane's app</h1>
  </header>
     <main class="main">
      <form>
      Description <input type="text" id="description"/><br>
      Datum <input type="date" id="Date" /><br>
      Kategorie<input type="text" id="kategorie" /><br>
      Amount<input type="number" id="amount" /><br>
      <input type="button" value="Submit" onclick="addRow()" >
      </form>
        <table id="Rows" class="center1">
         <tr>
          <th>Description</th>
          <th>Datum</th>
          <th>Kategorie</th>
          <th>Amount</th>
         </tr>
        </table>
    </main>
    <div>
      <img src="img/dish.png">
      <p>Änderung geführt für Version 5
      </p>
    </div>
    <script>
      function addRow() {
    var Newname = $("#description").val().toUpperCase();
    var NewDatum = $("#Date").val().toUpperCase();
    var NewKategorie = $("#kategorie").val().toUpperCase();
    var NewAmount= $("#amount").val().toUpperCase();
        $("<tr><td>" + Newname + "</td><td>" + NewDatum + "</td><td>" + NewKategorie + "</td><td>" + NewAmount + "</td></tr>").appendTo("#Rows")
    }
    </script>
    <script src="/js/app.js"></script>
</body>
</html>
<?php
}
?>
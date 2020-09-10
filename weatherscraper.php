<?php 
$weather = "";
$error = "";

    if($_GET['City']){
        $url_content = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['City'])."&appid=04413247a7614cbf3c37a7bc5c9b51b9"); 
        $weatherArray = json_decode($url_content,true);
        
        if ($weatherArray['cod'] == 200){
        
        $tempInCelcius= intval($weatherArray['main']['temp'] - 273);
        
        $weather = "The weather in ".$_GET['City']." is currently '".$weatherArray['weather'][0]['description']."'.
        The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']["speed"]." m/s.";
        }
        else{
        $error = "City not found";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather Scrapper</title>
    <style type="text/css">
        html { 
  background: url(image/v2osk-1Z2niiBPg5A-unsplash.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        body{
            background: none;
        }
        .container{
            text-align: center;
            margin-top: 200px;
            width: 450px;
        }
        input{
            margin-top: 20px;
        }
      </style>
  </head>
  <body>
    <div class="container">
    <h1>What's the Weather</h1>
     <form>
  <div class="form-group">
    <label for="City">Enter the city name</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Eg.London, Paris"  value="<?php echo $_GET['city']; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <br>
     <div id="weather"><?php if($weather){
    echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
}else if ($error){
    echo '<div class="alert alert-success" role="alert">'.$error.'</div>';
}?></div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
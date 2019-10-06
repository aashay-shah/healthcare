<?php
  require("database.php");
  mysqli_select_db($conn,"healthcare");
  $msg = "";
  $msgClass = "";
  if(filter_has_var(INPUT_POST, "submit"))
  { 
    $email_id = htmlspecialchars($_POST["email_id"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $age = htmlspecialchars($_POST["age"]);
    $education = htmlspecialchars($_POST["education"]);
    $smoker = htmlspecialchars($_POST["smoker"]);
    $cigarette = htmlspecialchars($_POST["cigarette"]);
    $bloodpressure_medicine = htmlspecialchars($_POST["bloodpressure_medicine"]);
    $prevalent_stroke = htmlspecialchars($_POST["prevalent_stroke"]);
    $prevalent_hyp = htmlspecialchars($_POST["prevalent_hyp"]);
    $diabetes = htmlspecialchars($_POST["diabetes"]);
    $cholestrol = htmlspecialchars($_POST["cholestrol"]);
    $systolic_bp = htmlspecialchars($_POST["systolic_bp"]);
    $diastolic_bp = htmlspecialchars($_POST["diastolic_bp"]);
    $weight = htmlspecialchars($_POST["weight"]);
    $height = htmlspecialchars($_POST["height"]);
    $bmi = $weight/($height * $height);
    $heart_rate = htmlspecialchars($_POST["heart_rate"]);
    $query = "INSERT INTO details(email_id, gender, age, education, smoker, cigarette, bloodpressure_medicine, prevalent_stroke, prevalent_hyp, diabetes, cholestrol, systolic_bp, diastolic_bp, bmi, heart_rate) VALUES('$email_id','$gender', '$age', '$education', '$smoker', '$cigarette', '$bloodpressure_medicine', '$prevalent_stroke', '$prevalent_hyp', '$diabetes', '$cholestrol', '$systolic_bp', '$diastolic_bp', '$bmi', '$heart_rate')";
    if(mysqli_query($conn, $query))
            {

            $msg =  'Details Recorded';
            $msgClass = 'alert-success';
            $_SESSION['message'] = 'Details Recorded';
            } 
            else 
            {
            $error= "Error Not Submitted ".mysqli_error($conn); 
            $msg =  "$error";
            $msgClass = 'alert-danger'; 
            }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Health Care</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <style>
        .mySlides {display:none;}
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Healthcare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Prediction<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Heart Disease</a>
            </li>
          </ul>
        </div>
    </nav>
    
      <img class="mySlides" src="1.jpg" style="width:100% height:50px">
      <img class="mySlides" src="2.jpg" style="width:100% height: 50px">
      <img class="mySlides" src="3.jpg" style="width:100% height: 50px">
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 3000); // Change image every 2 seconds
        }
    </script>

    <div class = "container">
        <div class="row">
      <div class ="col-md-6 offset-md-3">
        <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?> 
        <form name=myForm method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="panel panel-default form-panel" >
                <div class="panel-body">
                    <fieldset>
                      <div class="form-group">
                        <div class="panel-heading main-color-bg" style="font-size: 24px; color: blue">
                        <br>
                        Enter Details:
                        </div>
                        <label for="email_id">Email Address: </label>
                        <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Enter Email Address:" value="<?php echo isset($_POST['email_id']) ? $email_id : ''; ?>" required>
                        <br>
                        <label for="gender">Gender: </label>
                        <select name="gender" id="gender" class="form-control">
                        <option value=1>Male</option>
                        <option value=0>Female</option>
                        </select>
                        <br>
                        <label for="age">Age: </label>
                        <input type="text" name= "age" id="age" class="form-control" placeholder="Enter Age:" value="<?php echo isset($_POST['age']) ? $age : ''; ?>" required>
                        <br>
                        <label for="education">Education: </label>
                        <select name="education" id="education" class="form-control" >
                        <option value=1>Illiterate</option>
                        <option value=2>Schooling</option>
                        <option value=3>Graduate</option>
                        <option value=4>Post Graduate/PhD</option>
                        </select>
                        <br>
                        <label for="smoker">Frequent Smoker: </label>
                        <select name="smoker" id="smoker" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for="cigarette">Cigarettes Per Day: </label>
                        <input type="text" name="cigarette" id="cigarette" class="form-control" placeholder="Enter Number of Cigarattes consumed per day:" value="<?php echo isset($_POST['cigarette']) ? $cigarette : ''; ?>" required>
                        <br>
                        <label for=bloodpressure_medicine>Blood Pressure Medicines: </label>
                        <select name="bloodpressure_medicine" id="bloodpressure_medicine" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for=prevlent_stroke>Prevalent Stroke: </label>
                        <select name="prevalent_stroke" id="prevalent_stroke" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for=prevalent_hyp>Prevalent Hypertension: </label>
                        <select name="prevalent_hyp" id="prevalent_hyp" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for=diabetes>Diabetes: </label>
                        <select name="diabetes" id="diabetes" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for=cholestrol>Cholestrol: </label>
                        <select name="cholestrol" id="cholestrol" class="form-control">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                        </select>
                        <br>
                        <label for="systolic_bp">Systolic Blood Pressure: </label>
                        <input type="text" name="systolic_bp" id="systolic_bp" class="form-control" placeholder="Enter Systolic Blood Pressure:" value="<?php echo isset($_POST['systolic_bp']) ? $systolic_bp : ''; ?>" required>
                        <br>
                        <label for="diastolic_bp">Diastolic Blood Pressure: </label>
                        <input type="text" name="diastolic_bp" id="diastolic_bp" class="form-control" placeholder="Enter Diastolic Blood Pressure:" value="<?php echo isset($_POST['diastolic_bp']) ? $diastolic_bp : ''; ?>" required>
                        <br>
                        <label for="bmi">Body Mass Index: </label>
                        <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter Weight (in KG):" value="<?php echo isset($_POST['weight']) ? $weight : ''; ?>" required>
                        <br>
                        <input type="text" name="height" id="height" class="form-control" placeholder="Enter Height (in cm):" value="<?php echo isset($_POST['height']) ? $height : ''; ?>" required>
                        <br>
                        <label for="heart_rate">Heart Rate: </label>
                        <br>
                        <input type="text" name="heart_rate" id="heart_rate" class="form-control" placeholder="Enter Heart Rate:" value="<?php echo isset($_POST['heart_rate']) ? $heart_rate : ''; ?>" required>
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </fieldset>
                </div>
            </div>
        </form>
        </div>
    </body>
</html>
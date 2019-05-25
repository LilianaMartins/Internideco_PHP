
<?php



if(isset($_POST['submit'])) {


    $firstname = $_POST['First_Name'];
    $lastname = $_POST['Last_Name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    $email_contact = $_POST['email_contact'];
    $call_contact = $_POST['call_contact'];
    $sms_contact = $_POST['sms_contact'];
    $file = $_POST['file'];

    /*local database  connection details test */

   // $connection = mysqli_connect('localhost', 'root', '', 'Internideco');
    
    $connection = mysqli_connect('89.46.111.94', 'Sql1330405', '1257xwx4t1', 'Sql1330405_1');

    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $email = mysqli_real_escape_string($connection, $email);
    $number = mysqli_real_escape_string($connection, $number);
    $message = mysqli_real_escape_string($connection, $message);


   if($connection) {
            echo '<script>console.log("Connected")</script>';
        } else {
            die ("Database connection failed");
        }


   $query = "INSERT INTO enquiries(First_Name, Last_Name, email, number, message, file, email_contact, call_contact, sms_contact ) ";
    $query .= "VALUES ('$firstname', '$lastname', '$email', '$number', '$message', '$file', $email_contact, $call_contact, $sms_contact) ";

    mysqli_query($connection, $query);
    
    
    // emailing the PHP form

$email_from = 'info@internideco.co.uk';
$email_subject = 'New Enquiry';
$email_body = "You have received a new enquiry. Please see details below: \n
First Name: $firstname.\n
Last Name: $lastname.\n
Email: $email.\n
Phone Number: $number.\n\n\n
Message: \n
$message.\n
\n
Contact Preferences: \n
Email: $email_contact.\n
Phone Contact: $call_contact.\n
SMS/WhatsApp: $sms_contact.\n

End of message.";
    
$to = "info@internideco.co.uk";
$headers = "From: $email_from \r\n";
$headers .="Reply-to: $email \r\n";
mail($to,$email_subject,$email_body,$headers);


//securing against emaik injection

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}
    
    
    }



?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>InterniDeco</title>
  <!-- stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Roboto:300,700" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

  <!-- start navbar -->
  <nav class="navbar navbar-expand-md fixed-top navbar-dark">
    <a class="navbar-brand d-md-none" href="#">
      <img src="https://i.imgur.com/0jUdnaP.png" width="auto" height="50" class="d-inline-block align-top" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="justify-content-md-center collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#PageTop">Home<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#ourStory">Our Story</a>
        <a class="nav-item nav-link" href="#OurServices">Our Services</a>
        <a class="nav-item nav-link" href="#testimonials">Testimonials</a>
        <a class="nav-item nav-link" href="#quote">Get a quote</a>

        <a class="nav-item nav-link" href="#footer">Contact Us</a>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Projects
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Coming Soon</a>
            <a class="dropdown-item" href="#">Coming Soon</a>
            <a class="dropdown-item" href="#">Coming Soon</a>
          </div>
        </li> -->
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

  <!-- Carousel for large screens -->
  <div class="container-fluid containerHeader d-none d-md-block" id="PageTop">
    <div class="row rowHeader">
      <div class="col-md-12">
        <div class="headerLogoWrapper">
          <img class="HeaderLogo d-none d-sm-block" src="https://i.imgur.com/epuLcHr.png" alt="Large White Logo">
        </div>
      </div>
      <div class="col-md-12 colHeader">

        <div id="carouselExampleIndicators carouselHeader" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>
          <!-- large screens -->
          <div class="carousel-inner ">
            <div class="carousel-item active">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/cwjnpvG.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/fcxzEhD.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/BkRKZve.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/x1yUIpr.jpg" alt="Fourth slide">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- end of carousel for large screens -->

  <!-- mobile carousel -->

    <div class="container-fluid containerHeader d-md-none" id="PageTop">
    <div class="row rowHeader">
      <!-- <div class="col-12">
        <div class="headerLogoWrapper">
          <img class="HeaderLogo " src="media\Large  Final Internideco.png" alt="Large White Logo">
        </div>
      </div> -->
      <div class="col-12 colHeader">

        <div id="carouselExampleIndicators carouselHeader" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>

          <!-- mobile -->
          <div class="carousel-inner ">
            <div class="carousel-item active">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/zQcpqYU.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/BqU85yo.jpg" alt="Second slide">
            </div>
            <div class="carousel-item   ">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/1z1vAlx.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 min-vh-100" src="https://i.imgur.com/JDehxwl.jpg" alt="Fourth slide">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- this is the mainbody -->

  <main>
    <div class="container-fluid" id="ourStory">
      <div class="container flex-wrap">
        <h2>Our Story</h2>
        <div class="row" id="ourStoryText">
          <div class="d-flex align-items-center">
            <p>Our project started over 15 years ago in Italy. Since then our passion for interior design has grown and with it the size of our projetcs. The true essence of our work is to free imagination in order to create unique spaces.
              Cristian leads our London operation and works to expand the utilisation of exquisite materials within the London design scene. However, our projects can take us anywhere, from Ancona to Zurich - We are up for any challenge.
              More than two decades combined expertise in the industry have helped us develop new techniques and improve our skills, as well as our understanding of what our clients desire -they're at the heart of everything we do. <br>
              <span id="dots">...</span><span id="more">
                <strong>Passion, Precision, Care, Tidiness, Curiosity -</strong> these are the key words which guide our work.
                We provide a one-stop-shop solution from the design stage using <strong>professional 3D-rendering</strong> to the actual project execution and delivery. We want you to be part of every step. We love all our projects, from the smallest
                to the largest. We offer services inv
                <strong>Painting and Decorating, High-Standard Finishings such as Venezian Plastering, Carpentry, Custom Walls and Resisns.</strong>
                However, as every great artisan, we have a speciality:<br>
                <strong>Home Restyling & Bespoke Finishings, as well as luxury bathrooms.</strong> - where we achieve our best performance due to the deep knowledge of every material and technique.</p>
          </div>

          <button onclick="hideText()" class="btn" id="readMore">Read more</button>
          <!-- <div class="col-lg-3">
            <img id="Cristian" src="media\Cristian.jpg">
            <h4>Cristian Neacsu</h4>
          </div>
          <div class="col-lg-3">
            <img id="Michel" src="media\Michel.jpg">
            <h4>Michel D'Agostino</h4>
          </div> -->
        </div>
      </div>
    </div>

     <div class="container-fluid d-flex justify-content-center align-items-center black" id="paralax1">
      <div class="">
        <div class="row">
          <div class="col">
          </div>
        </div>
      </div>
    </div>

      <div class="container-fluid justify-content-around OurServices flex-wrap" id="OurServices">
      <h2>Our Services</h2>
      <div class="row ourServicesRow">
        <div class="col-lg-4 zoomContainer">
          <div class="d-flex align-items-center justify-content-center zoom servicesImgContainer1 ">
            <a href="homerestyling.html">
              <h3>Home Restyling</h3>
            </a>
            <figcaption>
              <a href="homerestyling.html">Find out More<i class="fas fa-chevron-right"></i></a>
            </figcaption>

          </div>

        </div>
        <div class="col-lg-4 zoomContainer">
          <div class="d-flex align-items-center justify-content-center zoom servicesImgContainer2">
            <a href="luxuryfinishings.html">
              <h3>Bespoke Luxury Finishings</h3>
            </a>
            <figcaption>
              <a href="luxuryfinishings.html">Find out More <i class="fas fa-chevron-right"></i></a>
            </figcaption>
          </div>
        </div>
        <div class="col-lg-4 zoomContainer">
          <div class="  d-flex align-items-center justify-content-center zoom  servicesImgContainer3">
            <a href="bathrooms.html">
              <h3>Bathroom Restyling</h3>
            </a>
            <figcaption>
              <a href="bathrooms.html">Find out More <i class="fas fa-chevron-right"></i></a>
            </figcaption>
          </div>
        </div>
      </div>
    </div>


    <!-- a paralax div -->

<div class="container-fluid d-flex justify-content-center align-items-center" id="paralax2">
      <div class="position:fixed">
        <div class="row">
          <div class="col">
          </div>
        </div>
      </div>
    </div>
    <!-- testimonials- potentially form houzz? -->
    <div class="container-fluid flex-wrap" id="testimonials">
      <h2>What our clients say</h2>
      <div class="row testimonialsRow">
        <!-- large screens -->
        <div class="col-md-12 d-none d-lg-block">
          <div class="card-deck ">
            <div class="card text-left">
              <div class="card-body">
                <h5 class="card-title">Sophia Lister</h5>
                <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                <p class="card-text">First hired Cristian to assist with fixing up a mess made by another handyman back in December 2017.Since then, no other person has been hired for any matters that needs repairing, etc around the house. He’s so
                  trusted that he’s been provided keys to let himself into the house.If he can’t assist to resolve the matter himself, he normally able recommend someone he knows. Aside from the handyman work, he’s also assisted with suggesting &
                  redesigning areas (ie. conversion of study desk area to be shelving/storage space for fold out guest bed to be installed; tailored made shoe stand in cloakroom, etc). He’s very good with thinking in his feet, suggesting a solution &
                  quite a perfectionist</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1224863/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
              </div>
            </div>
            <div class="card    text-left">
              <div class="card-body">
                <h5 class="card-title">Annamaria Paczer</h5>
                <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                <p class="card-text">Cristian and his team have converted my flat into a home! The project involved the refurbishment of the entire flat. He helped me to bring my ideas to life, he is resourceful and creative and comes up with
                  ingenious solutions to problems. The relationship was collaborative, real team work, he understood my wishes, whilst I valued his input and ideas and jointly we achieved better results than I anticipated. He was sensitive to the
                  fact that whilst the refurbishments were ongoing for the most time I also lived at the property and we could only progress in stages. Cristian takes pride in his work, he's a bit of a perfectionist and likes to complete things to
                  the highest standard.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1210553/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
              </div>
            </div>
            <div class="card    text-left">
              <div class="card-body">
                <h5 class="card-title">Ana Simao</h5>
                <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                <p class="card-text">I have used Interni Deco for many different projects in my house over the last three years. Christian is professional, his work is very detailed and he is very careful. I know my house is in trustworthy hands and
                  that it will be left clean when the work is complete. I thoroughly recommend Interni Deco from small jobs to larger decoration projects.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1224566/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
              </div>
            </div>
          </div>
        </div>

        <!-- mobile carousel deck -->

        <div class="col-md-12 d-lg-none d-sm-block d-xs-block d-md-block">
          <div id="carouselExampleIndicators" class="carousel slide carouselTestimonials" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="d-block">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Sophia Lister</h5>
                      <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                      <p class="card-text">First hired Cristian to assist with fixing up a mess made by another handyman back in December 2017.Since then, no other person has been hired for any matters that needs repairing, etc around the house. He’s
                        so
                        trusted that he’s been provided keys to let himself into the house.If he can’t assist to resolve the matter himself, he normally able recommend someone he knows. Aside from the handyman work, he’s also assisted with suggesting
                        &
                        redesigning areas (ie. conversion of study desk area to be shelving/storage space for fold out guest bed to be installed; tailored made shoe stand in cloakroom, etc). He’s very good with thinking in his feet, suggesting a
                        solution &
                        quite a perfectionist</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1224863/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Annamaria Paczer</h5>
                      <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                  <p class="card-text">Cristian and his team have converted my flat into a home! The project involved the refurbishment of the entire flat. He helped me to bring my ideas to life, he is resourceful and creative and comes up with
                        ingenious solutions to problems. The relationship was collaborative, real team work, he understood my wishes, whilst I valued his input and ideas and jointly we achieved better results than I anticipated. He was sensitive to
                        the
                        fact that whilst the refurbishments were ongoing for the most time I also lived at the property and we could only progress in stages. Cristian takes pride in his work, he's a bit of a perfectionist and likes to complete things
                        to
                        the highest standard.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1210553/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="col">
                  <div class="card">

                    <div class="card-body">
                      <h5 class="card-title">Ana Simao</h5>
                      <h6 class="card-subtitle mb-2 text-muted"><span id="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></h6>
                        <br><br>     <p class="card-text">I have used Interni Deco for many different projects in my house over the last three years. Christian is professional, his work is very detailed and he is very careful. I know my house is in trustworthy
                        hands
                        and
                        that it will be left clean when the work is complete. I thoroughly recommend Interni Deco from small jobs to larger decoration projects.</p>  <br><br>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><a href="https://www.houzz.co.uk/viewReview/1224566/Interni-Deco-review" class="card-link">View on houzz.co.uk</a></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="row justify-content-center" id="houzzBadges">
        <div class="col-md-4">
          <div class="allBadgeList">
            <h3>Houzz Award</h3>
            <table>
              <tr>
                <td><img class="badgePic badge_47_8" src="https://i.imgur.com/iKtA4F8.png" /></td>
                <td>
                  <p>Best of Houzz 2019 - Client Satisfaction
                    This professional was rated at the highest level for client satisfaction by the Houzz community.
                    Awarded on 19 January 2019</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- a paralax div -->

    <div class="container-fluid" id="paralax3">
    </div>


    <!-- how do you perfer to be contacted? -->
    <div class="container-fluid myForm" id="quote">
      <h2>Get a quote</h2>
      <div class="container">
        <div class="row ">
          <div class="col">
            <form action="index.php" method="post">
              <div class="form-row">
                <div class="col-md-3 offset-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="firstName" placeholder="First Name" name="First_Name" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="Last_Name" required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-3 offset-md-3">
                  <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" name="number" required>
                  </div>
                </div>
              </div>
              <!-- contact preferences -->
              <div class="form-row">
                <div class="col-md-6 offset-md-3">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="What do you have in mind?" id="exampleFormControlTextarea1" rows="6" name="message" required></textarea>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 offset-md-3 justify-content-start">
                  <p>How do you prefer to be contacted?</p>

                  <span id="contact">
                    <div class="form-check form-check-inline">
                     <input type="hidden" name="email_contact" value="0">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="email_contact">
                      <label class="form-check-label" for="inlineCheckbox1">Email</label>
                    </div>
                    <div class="form-check form-check-inline">
                         <input type="hidden" name="call_contact" value="0">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="call_contact">
                      <label class="form-check-label" for="inlineCheckbox2">Call</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="hidden" name="sms_contact" value="0">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" name="sms_contact">
                      <label class="form-check-label" for="inlineCheckbox3">SMS/WhatsApp</label>
                  </div>
                </span>
                <br>

              </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 offset-md-3">
                  <div class="form-group">

                   <!-- <p>Feel free to upload a picture of some inspiration you may have or of the room you'd like to re-design.</p>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">-->
                  </div>
                </div>
              </div>
              <button id="quoteButton" type="submit" name="submit" class="btn .btn-outline-secondary">Send</button>
            </form>
          </div>
        </div>

      </div>
    </div>


    <!-- paralax div -->
    <div class="container-fluid" id="paralax4"></div>
  </main>

  <!-- Start of footer  -->
  <footer id="footer">
    <div class="container-fluid d-flex text-align-center justify-content-center">
      <div class="row footerRow">
        <div class="col">
          <span id="icons">
            <h3>Follow Us</h3>
          <a target="_blank" href="https://www.facebook.com/internideco.uk/">  <i class="fab fa-facebook fa-2x"></i></a>
          <a target="_blank" href="https://twitter.com/internideco.uk">  <i class="fab fa-twitter-square fa-2x"></i></a>
          <a target="_blank" href="https://www.instagram.com/internideco.uk/">  <i class="fab fa-instagram fa-2x"></i></a>
          <a target="_blank" href="https://www.pinterest.co.uk/internidecouk/">  <i class="fab fa-pinterest-square fa-2x"></i></a>
          </span>
        </div>

        <div class="col">
          <h3>Contact Us</h3>
          <p><i class="fas fa-phone fa-1x"></i>07757085451</p>
          <p><i class="fas fa-envelope fa-1x"></i>
            info@internideco.co.uk</p>
        </div>
      </div>

    </div>

    <div class="container-fluid d-none  d-md-block">

      <ul class="partnerList">
        <li><img class="partnerLogo" src="https://i.imgur.com/z7WhVXo.png" alt="Logo Georgio Graesan"></li>
        <li><img class="partnerLogo" src="https://i.imgur.com/lM2n1xo.png" alt="Logo Matropolis"></li>
        <li><img src="https://i.imgur.com/l6MI8cL.png" alt="Logo Oikos"></li>
        <!-- <li><img class="partnerLogo" src="media\partner logos\resine decora.png" alt=""></li> -->
        <li><img height="40px" width="auto" src="https://i.imgur.com/UwaiwUE.png" alt="Logo Nord Resine"></li>
        <li><img height="40px" width="auto" src="https://i.imgur.com/gIUsSp1.png" alt="Logo Novacolor"></li>
      </ul>
    </div>
  </footer>

  <div id="Copyright" class="footer">
    <p>Copyright InterniDeco 2016-2019</p>

  </div>
  <div class="backToTop">

    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

  </div>

  <!-- end of footer -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="responsive.js" type="text/javascript"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Icons -->

  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>


  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>


  <!-- Your customer chat code -->
  <div class="fb-customerchat" attribution=setup_tool page_id="700401760111304" theme_color="#e6c900" logged_in_greeting="Hi! How can we help you?" logged_out_greeting="Hi! How can we help you?">
  </div>




</body>

</html>

<?php
  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }
?>



<!DOCTYPE html>
<html lang="el">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/doatap_shortcut.png" type="image/x-icon" />

    <title>ΔΟΑΤΑΠ - Αρχική</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>information@doatap.gr</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>210-5281000</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <img src="assets/images/doapat_logo_black.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">ΝΕΑ ΑΙΤΗΣΗ</a></li>
              <li class="scroll-to-section"><a href="#process">ΔΙΑΔΙΚΑΣΙΑ</a></li>
              <li class="scroll-to-section"><a href="#documents">ΔΙΚΑΙΛΟΓΗΤΙΚΑ</a></li>
              <li class="scroll-to-section"><a href="#contact">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
              <?php
                //check if user is signed in
                if(isset($_SESSION['id']))
                {
                  $username = $_SESSION['username'];
                  if(isset($_SESSION['admin']))
                    echo "<li class='scroll-to-section'><div class='border-first-button'><a href='User/template/pages/admin-application/admin-application.html'>$username</a></div></li>";
                  else
                    echo "<li class='scroll-to-section'><div class='border-first-button'><a href='User/template/pages/form/form.html'>$username</a></div></li>";
                }
                else
                {
                  echo " <li class='scroll-to-section'><div class='border-first-button'><a href='connect/sign-in.html'>ΣΥΝΔΕΣΗ</a></div></li>";
                }
              ?>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Αίτηση Αναγνώρισης Ισοτιμίας</h6>
                    <h2>Αντιστοίχισε το πτυχίο σου με ελληνικό ΑΕΙ</h2>
                    <p>Για τη δημιουργία αίτησης ισοτιμίας θα χρειαστεί να εγγραφείτε στον οργανισμό μας
                      ή να συνδεθείτε αν έχετε ήδη λογαριασμό.
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <?php
                        //check if user is signed in
                        if(isset($_SESSION['id']))
                        {
                          if(isset($_SESSION['admin']))
                            echo "<li class='scroll-to-section'><div class='border-first-button'><a href='User/template/pages/admin-application/admin-application.html'>Εκκρεμείς Αιτήσεις</a></div></li>";
                          else
                            echo "<li class='scroll-to-section'><div class='border-first-button'><a href='User/template/pages/form/form.html'>Δημιουργία Αίτησης</a></div></li>";
                        }
                        else
                          echo "<a href='connect/sign-in.html'>Δημιουργία Αίτησης</a>";
                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/application.png" alt="φορμα αιτησης">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="process" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/process.jpg" alt="βηματα">
              </div>
            </div>
            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h6>Διαδικασια Ισοτιμίας</h6>
                  <h4>Ποια είναι η διαδικασία απόκτησης ισοτιμίας με  <em>ελληνικό ΑΕΙ</em></h4>
                  <div class="line-dec"></div>
                </div>
                <p>Η απόκτηση ισοτιμίας ολοκληρώνεται σε τρια απλά βήματα. Αρχικά, πρέπει να υποβάλλετε την αίτηση ισοτιμίας.
                  Στη συνέχεια, θα ελεγχθούν τα δικαιολογητικά της αίτησης και, σε περίπτωση λάθους, αυτή θα απορριφθεί.
                  Τέλος - αν δεν υπάρχει λάθος στα δικαιολογητικά - θα γίνει η αντιστοίχιση με το κατάλληλο τμήμα και, αν χρειαστεί,
                  θα οριστούν προτεινόμενα μαθήματα για απόκτηση ισοτιμίας.</p>
                <h6 class = "per-hading">Χρόνοι Διεκπεραίωσης Αιτήσεων</h6>
                <div class="row">
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="50">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            48,1%<br>
                            <span>1-2 Μήνες</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="30">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            30,8%<br>
                            <span>4-5 Μήνες</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="20">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            21,1%<br>
                            <span>5+ Μήνες</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="documents" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>ΔΙΚΑΙΛΟΓΗΤΙΚΑ ΑΙΤΗΣΕΩΝ</h6>
            <h4>Απαραίτητα διακαιολογητικά για απόκτηση <em> ισοτιμίας</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/service-icon-03.png" alt=""></span>
                        Τίτλος Σπουδών προς Αναγνώριση
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/service-icon-03.png" alt=""></span>
                        Πιστοποιητικό Μαθημάτων
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/service-icon-03.png" alt=""></span>
                        Ταυτότητα ή Διαβατήριο
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>ΤΙΤΛΟΣ ΣΠΟΥΔΩΝ ΠΡΟΣ ΑΝΑΓΝΩΡΙΣΗ</h4>
                                <p>Τίτλος σπουδών (πτυχίο) του οποίου ζητείται η αναγνώριση, θεωρημένος
                                  για τη γνησιότητα των υπογραφών σύμφωνα με τη Σύμβαση της Χάγης
                                  (σφραγίδα APOSTILLE), σε νομίμως επικυρωμένο αντίγραφο από:.</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> τη μεταφραστική υπηρεσία του Υπουργείου Εξωτερικών της Ελλάδος ή</span>
                                   <span><i class="fa fa-check"></i> την Πρεσβεία ή το Προξενείο της Ελλάδος στην χώρα που εκδίδεται
                                    το έγγραφο ή</span>
                                   <span><i class="fa fa-check"></i> Έλληνα δικηγόρο</span></div>
                                <p>και με επίσημη μετάφρασή του, εκτός αν αυτό είναι στην ελληνική,
                                  αγγλική ή γαλλική γλώσσα οπότε δεν απαιτείται μετάφραση. Για όσες
                                  χώρες δεν έχουν κυρώσει τη Σύμβαση ή η χώρα μας έχει εγείρει
                                  αντίρρηση, και μόνο γι’ αυτές, η θεώρηση γίνεται από τις επιτόπιες
                                  Ελληνικές Προξενικές Αρχές.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>ΠΙΣΤΟΠΟΙΗΤΙΚΟ ΜΑΘΗΜΑΤΩΝ</h4>
                                <p>Επίσημο πιστοποιητικό μαθημάτων (official transcript) με αναλυτική
                                  βαθμολογία όλων των ετών φοίτησης το οποίο πρέπει να είναι
                                  ενυπόγραφο, να φέρει τη σφραγίδα του Ιδρύματος και να αναφέρει την
                                  ημερομηνία απονομής του τίτλου. Κατατίθεται το επίσημο πιστοποιητικό
                                  μαθημάτων, θεωρημένο για τη γνησιότητα των υπογραφών, σύμφωνα
                                  με τα οριζόμενα στη σύμβαση της Χάγης (σφραγίδα APOSTILLE), σε
                                  νομίμως επικυρωμένο αντίγραφο από:</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> τη μεταφραστική υπηρεσία του Υπουργείου Εξωτερικών της Ελλάδος ή</span>
                                  <span><i class="fa fa-check"></i> την Πρεσβεία ή το Προξενείο της Ελλάδος στην χώρα που εκδίδεται
                                    το έγγραφο ή</span>
                                    <span><i class="fa fa-check"></i>  Έλληνα δικηγόρο</span>
                                  </div>
                                <p>και με επίσημη μετάφρασή του, εκτός αν αυτό είναι στην ελληνική,
                                  αγγλική ή γαλλική γλώσσα οπότε δεν απαιτείται μετάφραση. Για όσες
                                  χώρες δεν έχουν κυρώσει τη σύμβαση της Χάγης ή η χώρα μας έχει εγείρει
                                  αντίρρηση, και μόνο για αυτές, η θεώρηση γίνεται από τις επιτόπιες
                                  Ελληνικές Προξενικές Αρχές.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image-02.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>ΤΑΥΤΟΤΗΤΑ Η ΔΙΑΒΑΤΗΡΙΟ</h4>
                                <p>Ταυτότητα ή διαβατήριο σε ευκρινές φωτοαντίγραφο (στη περίπτωση
                                  ταυτότητας ή διαβατηρίου της αλλοδαπής, ευκρινές φωτοαντίγραφο από
                                  το αντίγραφο που έχει επικυρωθεί από δικηγόρο της ημεδαπής).</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image-03.jpg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-banner wow fadeIn" id="org" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>Ο ΟΡΓΑΝΙΣΜΟΣ</h6>
                    <h2>Ταυτότητα Οργανισμού</h2>
                    <p>
                      Ο Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης (Δ.Ο.Α.Τ.Α.Π.) είναι ο επίσημος φορέας της Ελληνικής Δημοκρατίας για την ακαδημαϊκή αναγνώριση τίτλων που απονέμονται από εκπαιδευτικά ιδρύματα ανώτατης εκπαίδευσης της αλλοδαπής και για την έγκυρη πληροφόρηση για τα Ανώτατα Εκπαιδευτικά Ιδρύματα και τους τίτλους σπουδών στην Ελλάδα και το εξωτερικό.
                    </p>
                    <p>
                      Ο Δ.Ο.Α.Τ.Α.Π. είναι Νομικό Πρόσωπο Δημοσίου Δικαίου, εποπτευόμενο από τον Υπουργό Παιδείας και Θρησκευμάτων, με έδρα την Αθήνα.
                    </p>
                    <p>
                      Ο Οργανισμός στις διεθνείς του σχέσεις χρησιμοποιεί την επωνυμία “Hellenic National Academic Recognition and Information Center (Hellenic NARIC)”. Με την ονομασία αυτή είναι μέλος των δικτύων ENIC (European Network of National Information Centers) και NARIC (National Academic Recognition Information Centers). Αναφέρεται στο Υπουργείο Παιδείας & Θρησκευμάτων για τη Lisbon Recognition Convention (LRC) και ενημερώνει την UNESCO, το Council of Europe και την LRC Committee για θέματα της αρμοδιότητάς του.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/graduation_hat.jpg" alt="καπελο αποφοιτησης">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>ΕΠΙΚΟΙΝΩΝΙΑ</h6>
            <h4>Δια ζώσης εξυπηρέτηση <em>από Δευτέρα έως Πέμπτη 9:00-12:00</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="assets/images/contact-dec-v3.png" alt="">
                </div>
              </div>
              <div class="col-lg-5">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3144.6516724681805!2d23.72039561518074!3d37.985257579721655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bd2f5b84e6b7%3A0x987a1b34acddf277!2zzpHOs86vzr_PhSDOms-Jzr3Pg8-EzrHOvc-Ezq_Ovc6_z4UgNTQsIM6RzrjOrs69zrEgMTA0IDM3!5e0!3m2!1sel!2sgr!4v1641376458922!5m2!1sel!2sgr"
                   width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/phone-icon.png" alt="">
                          <a href="#">210-5281000</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/email-icon.png" alt="">
                          <a href="#">information@doatap.gr</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/location-icon.png" alt="">
                          <a href="#">Αγίου Κωνσταντίνου 54, Αθήνα</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="'Ονομα" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                      </fieldset>
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Θέμα" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Μήνυμα" required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Στείλε Μας Μήνυμα Τώρα</button>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 DigiMedia Co., Ltd. All Rights Reserved.
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>

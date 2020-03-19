<!-- Start screen including a form to get childrens data to create a personalised ID -->

<!DOCTYPE html>
<html>

<head>
  <title>Cramlington Careers Tracker</title>
  <meta charset="UTF-8" />
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/> -->
  <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- <link href="static/css/bootstrap-slate.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="style.css" />
  <?php
  /** 
   * Start session to use as data storage to keep personal data 
   */
  session_start();
  ?>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container-fluid">
      <h1 class="display-4">Cramlington Careers Tracker</h1>
      <p class="lead">Hello.</p>
      <p>In a minute you will get to play a simple sorting game.
        Before you get started, please add your details below.
      </p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Personal info form -->
      <div class="col-md-10 mx-auto">
        <!-- span 10 of 12 columns, mx-auto centres the resulting layout -->
        <form action="./redirect.php" method="post">
          <div class="row">
            <div class="col">
              <legend>Your name</legend>
            </div>
            <div class="col">
              <legend>Your date of birth</legend>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <input type="text" class="form-control" name="fname" placeholder="First name..." required>
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name="lname" placeholder="Last name..." required>
            </div>
            <div class="col">
              <select class="form-control" name="bday" required>
                <option selected disabled">Day</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
            </div>
            <div class="col">
              <select name="bmonth" class="form-control" required>
                <option selected disabled>Month</option>
                <option value='01'>January</option>
                <option value='02'>February</option>
                <option value='03'>March</option>
                <option value='04'>April</option>
                <option value='05'>May</option>
                <option value='06'>June</option>
                <option value='07'>July</option>
                <option value='08'>August</option>
                <option value='09'>September</option>
                <option value='10'>October</option>
                <option value='11'>November</option>
                <option value='12'>December</option>
              </select>
            </div>
            <div class="col">
              <select name="byear" class="form-control">
                <option selected disabled>Year</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <!-- <small id="nameHelp" lass="form-text text-muted">We don't store your full name, just an identifier made from it.</small> -->
            </div>
            <div class="col"></div>
          </div>
          <div class="row">
            <div class="col">
              <legend>About you</legend>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <select name="gender" class="form-control" required>
                <option selected disabled>I am...</option>
                <option value="f">I am a girl...</option>
                <option value="m">I am a boy...</option>
              </select>
            </div>
            <div class="col-3">
              <select name="yeargroup" class="form-control" required>
                <option selected disabled>...in year...</option>
                <!-- <option value="1">...in year 1...</option> -->
                <!-- <option value="2">...in year 2...</option> -->
                <!-- <option value="3">...in year 3...</option> -->
                <!-- <option value="4">...in year 4...</option> -->
                <!-- <option value="5">...in year 5...</option> -->
                <!-- <option value="6">...in year 6...</option> -->
                <option value="7">...in year 7...</option>
                <option value="8">...in year 8...</option>
                <option value="9">...in year 9...</option>
                <option value="10">...in year 10...</option>
                <option value="11">...in year 11...</option>
                <option value="12">...in year 12...</option>
                <option value="13">...in year 13...</option>
              </select>
            </div>
            <div class="col-6">
              <select name="school" class="form-control" required>
                <option selected disabled>...in school...</option>
                <option value='0000'>Test School</option>
                <!-- <option value='0021'>...in Chopwell</option>
                <option value='0022'>...in Castletown.</option>
                <option value='0023'>...in Morpeth Road.</option>
                <option value='0024'>...in Albany Village.</option>
                <option value='0025'>...in Battle Hill Primary.</option>
                <option value='0026'>...in Barley Mow Primary.</option>
                <option value='0027'>...in Burradon Community Primary.</option>
                <option value='0028'>...in Chillingham Road Primary.</option>
                <option value='0029'>...in Kenton Bar Primary.</option>
                <option value='0030'>...in New York Primary</option> 
                <option value='0031'>...in St. Mary's RC Primary.</option>
                <option value='0032'>...in Cleadon C of E Primary.</option>
                <option value='0033'>...in Hadrian Park Primary.</option>
                <option value='0034'>...in South Hylton Primary Academy.</option>
                <option value='0035'>...in St. Mark's RC Primary.</option>
                <option value='0036'>...in Willow Fields Primary.</option>
                <option value='0037'>...in Holystone Primary.</option>
                <option value='0038'>...in Barnes Junior School.</option>
                <option value='0039'>...in Waverley Primary School.</option>
                <option value='0040'>...in Valley Road.</option> -->
                <option value='0041'>...in Cramlington Learning Village</option>
              </select>
            </div>
          </div> <!-- form-group row -- School -->

          <div class="form-group row">
            <div class="col">
              <legend>Your views</legend>
              <div class="form-group form-check" id="likert">
                <label>How much do you like science?</label>
                <ul class="likert">
                  <li>
                    <input type="radio" class="form-check-input" name="likesci" value="1" id="like1">
                    <!-- <label for="like1">😄</label> -->
                    <label for="like1">
                      <img src="static/images/likert-01.png" width="50px" height="50px" alt="😄">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="likesci" value="2" id="like2">
                    <!-- <label for="like2">🙂</label> -->
                    <label for="like2">
                      <img src="static/images/likert-02.png" width="50px" height="50px" alt="🙂">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="likesci" value="3" id="like3">
                    <!-- <label for="like3">😐</label> -->
                    <label for="like3">
                      <img src="static/images/likert-03.png" width="50px" height="50px" alt="😐">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="likesci" value="4" id="like4">
                    <!-- <label for="like4">🙁</label> -->
                    <label for="like4">
                      <img src="static/images/likert-04.png" width="50px" height="50px" alt="🙁">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="likesci" value="5" id="like5">
                    <!-- <label for="like5">☹️</label> -->
                    <label for="like5">
                      <img src="static/images/likert-05.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                </ul>
                <label>How good are you at science?</label>
                <ul class="likert">
                  <li>
                    <input type="radio" class="form-check-input" name="goodsci" value="1" id="good1">
                    <!-- <label for="good1">😄</label> -->
                    <label for="good1">
                      <img src="static/images/likert-01.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="goodsci" value="2" id="good2">
                    <!-- <label for="good2">🙂</label> -->
                    <label for="good2">
                      <img src="static/images/likert-02.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="goodsci" value="3" id="good3">
                    <!-- <label for="good3">😐</label> -->
                    <label for="good3">
                      <img src="static/images/likert-03.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="goodsci" value="4" id="good4">
                    <!-- <label for="good4">🙁</label> -->
                    <label for="good4">
                      <img src="static/images/likert-04.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                  <li>
                    <input type="radio" class="form-check-input" name="goodsci" value="5" id="good5">
                    <!-- <label for="good5">☹️</label> -->
                    <label for="good5">
                      <img src="static/images/likert-05.png" width="50px" height="50px" alt="☹️">
                    </label>
                  </li>
                </ul>
              </div> <!-- form-group -->
            </div> <!-- col -->
          </div> <!-- form-group row -->
          <div class="form-group row">
            <div class="col">
              <button type="submit" class="submit btn btn-warning" value="To Activity">To Activity</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- container -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
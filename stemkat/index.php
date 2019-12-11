<!-- Start screen including a form to get childrens data to create a personalised ID -->

<!DOCTYPE html>
<html>

<head>
  <title>NUSTEM Games for CITE</title>
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
  <div class="container">
    <div class="row">
      <div class="jumbotron">
        <h1 class="display-4">STEMKAT: NUSTEM Games for CITE test</h1>
        <p class="lead">Hello. Welcome to NUSTEM's games pages.</p>
        <p>In a minute you will get to play two different games. But
          before you get started please add your name, date of birth
          and school name below (name and dates will be used to
          create an anonymous identifier):</p>
      </div>
    </div>
    <div class="row">
      <!-- Personal info form -->
      <div class="col-md-10 mx-auto">
        <!-- span 10 of 12 columns, mx-auto centres the resulting layout -->
        <form action="./redirect.php" method="post">
          <div class="form-group row">
            <legend>Your name</legend>
            <div class="col">
              <input type="text" class="form-control" name="fname" placeholder="First name..." required>
              <small id="nameHelp" lass="form-text text-muted">We don't store your full name, just an identifier made from it.</small>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="lname" placeholder="Last name..." required>
            </div>
            <!-- <label for="name1">Your name</label> -->
          </div> <!-- row -->
          <div class="form-group row">
            <legend>Your date of birth</legend>
            <div class="col-2">
              <select class="form-control" name="bday" required>
                <option selected disabled">Day</option>
                <option value="01">1</option>
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
              <!-- <input type="number" name="bday" min="1" max="31" placeholder="Birth day...">  -->
            </div>
            <div class="col-2">
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
            <div class="col-2">
              <select name="byear" class="form-control">
                <option selected disabled>Year</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value-"2007">2007</option>
                <option value-"2008">2008</option>
                <option value-"2009">2009</option>
                <option value-"2010">2010</option>
                <option value-"2011">2011</option>
                <option value-"2012">2012</option>
                <option value-"2013">2013</option>
                <option value-"2014">2014</option>
                <option value-"2015">2015</option>
                <option value-"2016">2016</option>
              </select>
            </div>
          </div> <!-- form-group row -- Date of birth-->
          <div class="form-group row">
            <legend>Your school</legend>
            <div class="col">
              <!-- TODO: Amend schools list -->
              <select name="school" class="form-control" required>
                <option selected disabled>Select school...</option>
                <option value='0000'>Test School</option>
                <!-- <option value='0021'>Chopwell</option>
                <option value='0022'>Castletown</option>
                <option value='0023'>Morpeth Road</option>
                <option value='0024'>Albany Village</option>
                <option value='0025'>Battle Hill Primary</option>
                <option value='0026'>Barley Mow Primary</option>
                <option value='0027'>Burradon Community Primary</option>
                <option value='0028'>Chillingham Road Primary</option>
                <option value='0029'>Kenton Bar Primary</option>
                <option value='0030'>New York Primary</option> -->
                <option value='0031'>St. Mary's RC Primary</option>
                <option value='0032'>Cleadon C of E Primary</option>
                <option value='0033'>Hadrian Park Primary</option>
                <option value='0034'>South Hylton Primary Academy</option>
                <option value='0035'>St. Mark's RC Primary </option>
                <option value='0036'>Willow Fields Primary</option>
                <option value='0037'>Holystone Primary</option>
                <option value='0038'>Barnes Junior School</option>
              </select>
            </div>
          </div> <!-- form-group row -- School -->
          <div class="form-group row">
            <legend>About you</legend>
            <div class="col">
              <div class="form-group">
                <select name="gender" class="form-control" required>
                  <option selected disabled>I am...</option>
                  <option value="f">A girl</option>
                  <option value="m">A boy</option>
                </select>
              </div>
              <!-- <div class="form-group"> -->
              <select name="yeargroup" class="form-control" required>
                <option selected disabled>I am in...</option>
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
                <option value="5">Year 5</option>
                <option value="6">Year 6</option>
              </select>
              <!-- </div> -->
            </div>
          </div> <!-- form-group row -- about person -->
          <div class="form-group row">
            <legend>Your views</legend>
            <div class="col">

              <div class="form-group">
                <select name="likesci" class="form-control" required>
                  <option selected disabled>How much do you like science?</option>
                  <option value="1">I don't like science at all</option>
                  <option value="2">I don't like science very much</option>
                  <option value="3">I think science is just OK</option>
                  <option value="4">I quite like science</option>
                  <option value="5">I like science a lot</option>
                </select>
              </div>
              <select name="goodsci" class="form-control" required>
                <option selected disabled>How good are you at science?</option>
                <option value="1">I'm not at all good at science</option>
                <option value="2">I'm not very good at science</option>
                <option value="3">I'm just OK at science</option>
                <option value="4">I'm quite good at science</option>
                <option value="5">I'm very good at science</option>
              </select>
            </div>
          </div> <!-- form-group row -- views -->
          <div class="form-group row mt-5">
            <!-- <hr> -->
            <button type="submit" class="submit btn btn-warning" value="To Activity">To Activity</button>

          </div>
        </form>
      </div> <!-- container -->

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
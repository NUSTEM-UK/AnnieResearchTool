<!-- Start screen including a form to get childrens data to create a personalised ID -->

<!DOCTYPE html>
<html>
  <head>
    <title>NUSTEM Games for CITE</title>
    <meta charset="UTF-8" />
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/> -->
    <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php
      // Start session to use as data storage to keep personal data
      session_start();
    ?>
  </head>

  <body>

    <!-- <div id="content"> -->
      <div class="jumbotron">
        <h1 class="display-4">STEMKAT: NUSTEM Games for CITE</h1>
        <p class="lead">Hello. Welcome to NUSTEM's games pages.</p>
        <p>In a minute you will get to play two different games. But 
          before you get started please add your name, date of birth 
          and school name below (name and dates will be used to 
          create an anonymous identifier):</p>

      </div>

      <!-- Personal info form -->
      <form action="./redirect.php" method="post">
        <input type="text" name="fname" placeholder="First name..." required>
        <input type="text" name="lname" placeholder="Last name..." required>
        <input type="number" name="bday" min="1" max="31" placeholder="Birth day..."> <!-- Will allow selection of 31st day for any month -->

        <select name="bmonth" required>
          <option selected disabled>Birth month...</option>
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

        <!-- TODO: Amend schools list -->
        <select name="school" required>
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

        <select name="gender" required>
          <option selected disabled>Are you...</option>
          <option value="f">A girl</option>
          <option value="m">A boy</option>
        </select>

        <select name="yeargroup" required>
          <option selected disabled>I am in...</option>
          <option value="1">Year 1</option>
          <option value="2">Year 2</option>
          <option value="3">Year 3</option>
          <option value="4">Year 4</option>
          <option value="5">Year 5</option>
          <option value="6">Year 6</option>
        </select>

        <select name="likesci" required>
          <option selected disabled>How much do you like science?</option>
          <option value="1">I don't like science at all</option>
          <option value="2">I don't like science very much</option>
          <option value="3">I think science is just OK</option>
          <option value="4">I quite like science</option>
          <option value="5">I like science a lot</option>
        </select>

        <select name="goodsci" required>
          <option selected disabled>How good are you at science?</option>
          <option value="1">I'm not at all good at science</option>
          <option value="2">I'm not very good at science</option>
          <option value="3">I'm just OK at science</option>
          <option value="4">I'm quite good at science</option>
          <option value="5">I'm very good at science</option>
        </select>

        <input type="submit" class="submit" value="To Activity">
      </form>
    <!-- </div> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

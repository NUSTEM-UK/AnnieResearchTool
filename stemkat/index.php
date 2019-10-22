<!-- Start screen including a form to get childrens data to create a personalised ID -->

<!DOCTYPE html>
<html>
  <head>
    <title>NUSTEM Games for CITE</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg"/>
    <?php
      // Start session to use as data storage to keep personal data
      session_start();
    ?>
  </head>

  <body>

    <div id="content">
    	<h1>STEMKAT: NUSTEM Games for CITE</h1>
      <p>Hi... Welcome to NUSTEM's games pages. In a minute you will get to play two different games.</p>
      <p>But before you get started please add your name, date of birth and school name below (name and dates will be used to create an anonymous identifier):</p>

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
          <option value='0024'>Albany Village</option> -->
          <option value='0025'>Battle Hill Primary</option>
          <option value='0026'>Barley Mow Primary</option>
          <option value='0027'>Burradon Community Primary</option>
          <option value='0028'>Chillingham Road Primary</option>
          <option value='0029'>Kenton Bar Primary</option>
          <option value='0030'>New York Primary</option>
        </select>

        <select name="gender" required>
          <option selected disabled>Are you...</option>
          <option value="f">A girl</option>
          <option value="m">A boy</option>
        </select>

        <select name="yeargroup" required>
          <option selected disabled>I am in...</option>
          <option value="year1">Year 1</option>
          <option value="year2">Year 2</option>
          <option value="year3">Year 3</option>
          <option value="year4">Year 4</option>
          <option value="year5">Year 5</option>
          <option value="year6">Year 6</option>
        </select>

        <select name="likesci" required>
          <option selected disabled>How much do you like science?</option>
          <option value="0">I don't like science at all</option>
          <option value="1">I don't like science very much</option>
          <option value="2">I think science is just OK</option>
          <option value="3">I quite like science</option>
          <option value="4">I like science a lot</option>
        </select>

        <select name="goodsci" id="">
          <option selected disabled>How good are you at science?</option>
          <option value="0">I'm not at all good at science</option>
          <option value="1">I'm not very good at science</option>
          <option value="2">I'm just OK at science</option>
          <option value="3">I'm quite good at science</option>
          <option value="4">I'm very good at science</option>
        </select>

        <input type="submit" class="submit" value="To Activity">
      </form>
    </div>

  </body>
</html>

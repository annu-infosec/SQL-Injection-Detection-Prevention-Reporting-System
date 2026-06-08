<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College</title>
    <link rel="stylesheet" href="index.css">

    <style>
        .menu-container {
            position: absolute;
            top: 210px;
            right: 20px;
        }
        .menu-button {
            background-color: rgba(12, 12, 12, 0.683);
            color: white;;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .menu-options {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: rgba(12, 12, 12, 0.683);
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .menu-options a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: white;
        }
        .menu-options a:hover {
            background-color: rgba(12, 12, 12, 0.1);
            border-radius: 5px;

        }
    </style>

</head>
<body>
    <header>
        <div class="header" alt="Header">
          <div class="headerlogo"> <img class="headerlogo" src=""  alt="LOGO">
          </div>
          <div class="headertittle"> 
            <h1 class="headertittle">K</h1>
            <h2>College</h2>
          </div>
        </div>

   <div class="menu-container">
    <button class="menu-button" onclick="toggleMenu()">Menu</button>
    <div class="menu-options" id="menuOptions">
        <a href="admission_form_page_1.php">Admission form</a>
        <a href="course.php">Courses</a>
        <a href="login.php">Staff login</a>
    </div>
   </div>

   <script>
    function toggleMenu() {
        const menu = document.getElementById('menuOptions');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    // Close the menu if clicking outside
    window.onclick = function(event) {
        if (!event.target.matches('.menu-button')) {
            const menu = document.getElementById('menuOptions');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            }
        }
    }
   </script>

    </header>


    
    <div class="aboutdiv">
       
         <div class="aboutdiv_tittle">
         <h1 class="aboutdiv">About College</h1>
         </div>
                     <div class="aboutdiv_para">
                      "Our College established in 1988 under management of “National Technical Education Society” registered with Registrar Societies, Govt. of Rajasthan, and provides guideline for Competitive Exams, Trainings and placement assistance to those students who are doing his UG/PG Degree program like BCA, B.Sc.(PCM), BBA, B.Com., BA, MCA, M.Sc.(Physics), M.Sc. (Chemistry), M.Sc. (Botany), M.Sc.(Zoology), M.Sc. (Computer Science), MCA, MBA, B.Lib., M.Lib etc. from the Universities.
              
              "We are associated with Makhanlal Chaturvedi National University of Journalism & Communication, Bhopal to run regular degree courses like BCA, M.Sc. (Computer Science), PGDCA, DCA etc. since 1990."
              
              "Affiliated with Raj Rishi Bharthari Matsya University to run regular degree courses like B.Sc (Math), B,Sc (Bio) & BA in different streams.
                      </div>
    </div>
    

</body>
</html>

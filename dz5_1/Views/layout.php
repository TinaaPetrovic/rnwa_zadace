<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      * {
        box-sizing: border-box;
      }
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      th,
      td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      #resultDiv {
        overflow-x: auto;
        border-radius: 20px;
      }
      th {
        text-align: left;
      }
      .menu {
        background-color: lightblue;
        padding: 8px;
        margin-top: 7px;
        width: 100%;
        text-align: center;
      }
      .menu a {
        color: black;
        font-size: x-large;
        margin: 10px 40px 10px;
      }
      .header {
        background-color: lightblue;
        width: 70%;
        padding: 15px;
        text-align: center;
        display: inline-block;
      }
      .auth {
        background-color: lightblue;
        width: 25%;
        padding: 15px;
        text-align: center;
        float: right;
      }
      .auth a {
        color: black;
        margin: 10px 0px 10px;
      }
      .main {
        float: left;
        width: 80%;
        margin-bottom: 50px;
      }

      .main article {
        background-color: lightblue;
        margin-top: 25px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 20px;
        color: black;
        padding-bottom: 15px;
      }

      .main article img {
        border-radius: 50%;
        width: 50%;
        margin-left: 10px;
        margin-top: 10px;
      }

      .main h4 {
        margin-left: 20px;
      }

      .main div {
        display: table-cell;
      }

      div.articleLeft {
        width: 25%;
      }

      div.articleRight {
        width: 75%;
        vertical-align: top;
        padding-top: 15px;
      }

      div.articleRight img {
        border-radius: 0%;
        width: 70%;
      }

      .aside {
        background-color: lightblue;
        float: right;
        width: 20%;
        height: 100%;
        max-height: 100%;
        padding: 15px;
        margin-top: 7px;
        text-align: center;
        color: black;
      }

      .aside a {
        padding-top: 20px;
        text-decoration: none;
        color: black;
        display: block;
        transition: 0.3s;
      }

      .aside a:hover {
        color: #f1f1f1;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5%;
        background-color: lightblue;
        color: white;
        text-align: center;
      }

      #profilePic {
        border-radius: 50%;
        width: 85%;
      }

      @media only screen and (max-width: 620px) {
        /* For mobile phones: */

        body {
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
        }
        .header {
          width: 80%;
          order: 1;
        }
        .auth {
          width: 20%;
          order: 1;
        }
        .main {
          width: 100%;
          order: 2;
        }
        .menu {
          width: 100%;
          order: 3;
        }
        .aside {
          width: 100%;
          order: 4;
        }
        #profilePic {
          width: 30%;
        }
        #resultDiv {
          overflow-x: auto;
          width: 100%;
        }
        .footer {
          width: 100%;
          order: 5;
        }
      }
    </style>

    <script>
      function getTitles() {
        let str = document.getElementById("searchInput").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("resultDiv").innerHTML =
              xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET", "titles.php?s=" + str, true);
        xmlhttp.send();
      }
      function showHint(str) {
        if (str.length == 0) {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("txtHint").innerHTML =
                xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET", "titles_search.php?s=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
  </head>
  <body style="font-family: Verdana; color: #aaaaaa" onload="getTitles()">
    <div class="header">Logo</div>
    <div class="auth">
      <a class="login" href="#"> Login </a>
      <a class="register" href="#"> Register </a>
    </div>

    <div class="menu">
    <a href="departments">Departments</a>
    <a href="departments_create">New department</a>
    <a href="titles">Titles</a>
    <a href="titles_create">New title</a>
    <a href="professors">Professors</a>
    <a href="professors_create">New professor</a>
</div>

<div class="main">


    <?php require_once 'Routes.php'?>


</div>

    <div class="aside">
      <p
        style="
          font-family: Georgia, 'Times New Roman', Times, serif;
          font-size: 25px;
        "
      ></p>
      <a href="#">Settings</a>
      <a href="#">Logout</a>
    </div>

    <div class="footer">Sveučilište u Mostaru</div>
  </body>
</html>


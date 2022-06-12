<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital@1&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <style>

.submitsuccess 
        {
            width: 50%;
            margin:auto;
            height: 200px;
            display: flex;
            background-color: black;
            color: white;
            margin-top: 30px;
        }
        .submitmessage
        {
            width:50%;
            margin:auto;
        }
        .loginlink 
        {
            width:50%; 
            margin:auto;
            margin-top: 20px;
        }
        .loginlink a 
        {
            background-color: black;
            color: white;
            text-decoration: none;
            padding: 10px;
        }


        .form 
        {
            display: flex;
            flex-direction: column;
            border: 2px solid black;
            padding:10px;
            width: 50vw;
            margin: auto;
            margin-top: 30px;
            border-radius: 10px;
        }

        input
        {
            margin-bottom: 10px;
            margin-top:5px;
            height: 30px;
            padding: 10px;
        }
        .submit 
        {
            width: 20%;
            text-align: center;
            background-color: black;
            color :white;
            border-radius: 5px;

        }


    /*--------------------------------------------------------------------------------*/

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  li 
  {
      list-style-type: none;
  }
  
  li a 
  {
      color: white;
  }
  
  @media only screen and (-webkit-min-device-pixel-ratio: 1) and (min-device-width: 0px) and (max-device-width: 768px) {
    body {
      overflow-x: hidden;
    }
  
    .burger {
      border: 2px solid white;
      border-radius: 5px;
    }
  
    .navbar {
      background-color: black;
      color: white;
      display: flex;
      justify-content: space-around;
      align-items: center;
      height: 10vh;
    }
  
    /* for the ul styline */
    .nav_ul {
      position: absolute;
      right: 0px;
      height: 50vh;
      display: flex;
      flex-direction: column;
      top: 8vh;
      align-items: center;
      color: white;
      list-style-type: none;
      background-color: black;
      width: 50%;
      justify-content: space-around;
      transform: translateX(100%);
      transition: transform 0.5s ease-in;
    }
  
    .logo {
      font-family: 'Playfair Display SC', serif;
    }
  
    .nav_ul li {
      opacity: 0;
    }
  
    .burger div {
      background-color: white;
      width: 25px;
      height: 3px;
      margin: 5px;
      transition: all 0.3s ease;
    }
  
    .nav-active {
      transform: translateX(0%);
    }
  
    @keyframes navLinkFade {
      from {
        opacity: 0;
        transform: translateX(50px);
      }
      to {
        opacity: 1;
        transform: translateX(0px);
      }
    }
  
    .toggle .line1 {
      transform: rotate(-45deg) translate(-5px, 6px);
    }
  
    .toggle .line2 {
      opacity: 0;
    }
  
    .toggle .line3 {
      transform: rotate(45deg) translate(-5px, -6px);
    }
  }
  
  /* --------------------------------Tab / Ipad -----------------------------------------*/
  @media only screen and (-webkit-min-device-pixel-ratio: 1) and (min-device-width: 768px) and (max-device-width: 1007px) 
  {
  
  
      body 
      {
          display: flex;
      }
      header
      {
          display: flex;
          flex-direction: column;
          width:18%;
          height: 100%;
          background-color: black;
      }
  
      div.container
      {
          background-color:white;
      }
      .navbar {
          height: 100vh;
          color: white;
          display: flex;
          flex-direction: column;
        }
  
  
  
      .logo 
      {
         
          font-family: 'Playfair Display SC', serif;
          padding-top: 20px;
          text-align: center;
          height:10%;
      }
  
    .nav_ul 
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        height:60%;
        padding-bottom: 50px;
  
    }
  
  
  
  }
  
  /* ----------------------------Laptop -------------------------------------*/
  /* this orientation is for laptop */
  /* For 1024 Resolution */
  @media only screen and (min-width: 1008px) and (max-width: 1605px) {
    .navbar {
      background-color: black;
      color: white;
      display: flex;
      justify-content: space-around;
      align-items: center;
      height: 10vh;
    }
  
    /* for the ul styline */
    .nav_ul {
      display: flex;
      align-items: center;
      color: white;
      list-style-type: none;
      background-color: black;
      justify-content: space-around;
    }
  
    .nav_ul li {
      padding: 10px;
      margin-right: 20px;
      border-radius: 5px;
      border: 2px solid white;
    }
  
    .logo {
      font-size: 25px;
      font-family: 'Playfair Display SC', serif;
    }
  
    /* individual links setting --------------------------*/
    .link_one 
    {
        background-image: url("/img/twitter_icons/twitter.png");
    }
  }
  
  /* -----------------------------------Desktop -----------------------------------------*/
  /* this orientation is for desk top */
  /*
  @media only screen   
  and (min-width: 1370px)  
  and (max-width: 1605px)  
  { 
  
  } 
  */
  
  /* For mobile use if necessary  */
  /*
  @media only screen   
  and (min-device-width : 360px)   
  and (max-device-width : 640px)  
  {
      
  }  
  */
  



    /*--------------------------------------------------------------------------------*/

    </style>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">Destiny Obamwonyi</div>
        <ul class="nav_ul">
          <li><a href="/register" >register</a></li>
          <li><a href="/login" >login</a></li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    </header>

    <div class="container">
        {{template}}
    </div>
    <script src="/js/app.js"></script>
  </body>
</html>



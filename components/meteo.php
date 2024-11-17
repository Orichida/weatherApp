<?php
require_once '../security.php';
require_once '../connect.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
    <script src="../js/essentiels.js"></script>
    <script src="../js/script.js" defer></script>
    <script defer>$(document).ready(function () {
      printHist();
    })</script>
    <link rel="shortcut icon" href="../img/meteo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
  </head>
  <body>
  <?php require_once 'nav.php'; ?>
    <section class="main">
      <div class="search" id="search">
        <div class="searchChild">
          <input type="text" class="searchInput" placeholder="Search" />
        </div>
        <div class="searchChild">
          <hr />
        </div>
        <div class="searchChild">
          <ul class="searchContainer">
            <div class="loading">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.0001 12C20.0001 13.3811 19.6425 14.7386 18.9623 15.9405C18.282 17.1424 17.3022 18.1477 16.1182 18.8587C14.9341 19.5696 13.5862 19.9619 12.2056 19.9974C10.825 20.0328 9.45873 19.7103 8.23975 19.0612" stroke="#0091ff" stroke-width="3.55556" stroke-linecap="round"></path> </g></svg>
            </div>
          </ul>
        </div>
      </div>
      <div class="resources" style="display : none">
        <div class="city-info">
          <h2 class="city-name" id="cityName"></h2>
          <img src="/site/img/flags/tn.png" class="country-flag" id="currentFlag"/>
          <p class="current-time">
            Current time <span class="time" id="currentTime">3:57 PM</span>
          <span class="day-night">Day</span>
          </p>
      </div>
    <div class="temperature-info" id="temp">
      <p class="current-temp">
        Current temperature:<div class="temperature" id="currentT">17.4°C</div>
      </p>
      <p class="weekly-temp">Temperature throughout the week:</p>
      <ul class="weekly-forecast">
        <li class="forecast-item" id="t0">
          26-04-2024
          <span class="temp-details"
            >Max: <span class="max-temp">25</span>°C, Min:
            <span class="min-temp">10</span>°C</span
          >
        </li>
        <li class="forecast-item" id="t1">
          27-04-2024
          <span class="temp-details"
            >Max: <span class="max-temp">25</span>°C, Min:
            <span class="min-temp">10</span>°C</span
          >
        </li>
        <li class="forecast-item today" id="t2">
          Today
          <span class="temp-details"
            >Max: <span class="max-temp">25</span>°C, Min:
            <span class="min-temp">10</span>°C</span
          >
        </li>
        <li class="forecast-item" id="t3">
          29-04-2024
          <span class="temp-details"
            >Max: <span class="max-temp">25</span>°C, Min:
            <span class="min-temp">10</span>°C</span
          >
        </li>
        <li class="forecast-item" id="t4">
          30-04-2024
          <span class="temp-details"
            >Max: <span class="max-temp">25</span>°C, Min:
            <span class="min-temp">10</span>°C</span
          >
        </li>
      </ul>
    </div>
    <div class="weather-info" id="weather">
      <p class="current-weather">
        Current Weather:<div class="weatherr"><img src="/site/img/w_icons/0.png" id="currentW"><div class="weather-text" id="currentWT">Clear Sky</div></div>
      </p>
      <p class="weekly-weather">Weather throughout the week:</p>
      <ul class="weekly-forecast">
        <li class="forecast-item" id="w0">
          26-04-2024 :<div class="weather"><img src="/site/img/w_icons/0.png"><span class="weather-text">Clear Sky</span></div>
        </li>
        <li class="forecast-item" id="w1">
          27-04-2024 :<div class="weather"><img src="/site/img/w_icons/0.png"><span class="weather-text">Clear Sky</span></div>
        </li>
        <li class="forecast-item today" id="w2">
          Today :<div class="weather"><img src="/site/img/w_icons/0.png"><span class="weather-text">Clear Sky</span></div>
        </li>
        <li class="forecast-item" id="w3">
          28-04-2024 :<div class="weather"><img src="/site/img/w_icons/0.png"><span class="weather-text">Clear Sky</span></div>
        </li>
        <li class="forecast-item" id="w4">
          29-04-2024 :<div class="weather"><img src="/site/img/w_icons/0.png"><span class="weather-text">Clear Sky</span></div>
        </li>
      </ul>
    </div>
    <div class="wind-info" id="wind">
      <p class="current-weather">
        Current wind direction/speed :<div class="wind-dir">N<div id="current-arrow"><img src="/site/img/arrow.svg"></div>S</div><div class="weather-text"><span class="max-temp" id="current-wSpeed">15</span> km/h</div>
      </p>
      <p class="weekly-weather">Weather throughout the week:</p>
      <ul class="weekly-forecast">
        <li class="wind-item" id="wind0">
          26-04-2024 :<div class="wind-dir-item"><div id="w0-arrow" style="transform : rotate(300deg);"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">15</span> km/h</div>
        </li>
        <li class="wind-item" id="wind1">
          27-04-2024 :<div class="wind-dir-item"><div id="w1-arrow"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">15</span> km/h</div>
        </li>
        <li class="wind-item today" id="wind2">
          Today :<div class="wind-dir-item"><div id="w2-arrow"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">15</span> km/h</div>
        </li>
        <li class="wind-item" id="wind3">
          28-04-2024 :<div class="wind-dir-item"><div id="w3-arrow"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">15</span> km/h</div>
        </li>
        <li class="wind-item" id="wind4">
          29-04-2024 :<div class="wind-dir-item"><div id="w4-arrow"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">15</span> km/h</div>
        </li>
      </ul>
    </div>
      </div>
    </section>
  </body>
</html>

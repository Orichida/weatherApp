async function GetData(link) {
  try {
    const response = await fetch(link);
    if (!response.ok) {
      throw new Error("Erreur : ", response.status);
    } else {
      const data = await response.json();
      return data;
    }
  } catch (error) {
    console.error(error);
    return 0;
  }
}
meteo =
  "https://api.open-meteo.com/v1/forecast?latitude=36.8601&longitude=10.1934&current=temperature_2m&hourly=temperature_2m&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,wind_direction_10m_dominant&timezone=auto&past_days=3&forecast_days=3";
function printData(data) {
  if (data.hasOwnProperty("results")) {
    for (let index = 0; index < data.results.length; index++) {
      const element = data.results[index];
      $(".searchContainer").append(`
      <li id="${index}li">
              <span class="flagContainer">
                <img src="../img/flags/${element.country_code.toLowerCase()}.png" alt="" class="searchFlag" />
              </span>
              <span class="place">${element.name}</span>
              <span class="origin">${
                element.admin1
              } (${element.latitude.toFixed(2)}°E ${element.longitude.toFixed(
        2
      )}°N)
              </span>
              <script>
              $('#${index}li').click(function() {
                $.ajax({
                  type: "POST",
                  url: "/site/components/saveH.php",
                  data: {
                    idPlace: ${element.id},
                    flag: "${element.country_code.toLowerCase()}",
                    place: "${element.name}",
                    origin: "${element.admin1}",
                    lat: ${element.latitude},
                    long: ${element.longitude},
                  }
                });
                $(".searchContainer li:not(:first-child)").remove();
                printHist();
                window.weatherText = {
                  name : "${element.name}",
                  flag : '${element.country_code.toLowerCase()}',
                  lat : ${element.latitude},
                  longi : ${element.longitude}
                };
                printForecast();
              });
      </script>
            </li>
      `);
    }
  } else {
    $(".searchContainer li:not(:first-child)").remove();
  }
}
function printHist() {
  setTimeout(() => {
    $.ajax({
      type: "POST",
      url: "/site/components/getH.php",
      success: function (response) {
        response = JSON.parse(response);
        i = 0;
        response.forEach((element) => {
          $(".searchContainer").append(`
          <li id="${i}li">
                  <span class="flagContainer">
                    <img src="../img/flags/${element.flag.toLowerCase()}.png" alt="" class="searchFlag" />
                  </span>
                  <span class="place">${element.name}</span>
                  <span class="origin">${element.admin1} (${parseFloat(
            element.lat
          ).toFixed(2)}°E ${parseFloat(element.longi).toFixed(2)}°N)
                  </span>
                </li>
                <script>
              $('#${i}li').click(function() {
                window.weatherText = {
                  name : "${element.name}",
                  flag : '${element.flag.toLowerCase()}',
                  lat : ${element.lat},
                  longi : ${element.longi}
                };
                printForecast();
              })
              </script>
          `);
          i++;
        });
      },
    });
  }, 50);
}
function CodeToText(val) {
  switch (val) {
    case 0:
      return "Clear Sky";
    case 1:
      return "Mainly clear";
    case 2:
      return "Partly Cloudy";
    case 3:
      return "Overcast";
    case 45:
      return "Fog";
    case 48:
      return "Depositing Rime Fog";
    case 51:
      return "Light Drizzle";
    case 53:
      return "Moderate Drizzle";
    case 55:
      return "Dense Drizzle";
    case 56:
      return "Light Freezing Drizzle";
    case 57:
      return "Dense Freezing Drizzle";
    case 61:
      return "Slight Rain";
    case 63:
      return "Moderate Rain";
    case 65:
      return "Heavy Rain";
    case 66:
      return "Light Freezing Rain";
    case 67:
      return "Heavy Freezing Rain";
    case 71:
      return "Slight Snow Fall";
    case 73:
      return "Moderate Snow Fall";
    case 75:
      return "Heavy Snow Fall";
    case 77:
      return "Snow grains";
    case 80:
      return "Slight Rain Shower";
    case 81:
      return "Moderate Rain Shower";
    case 82:
      return "Violent Rain Shower";
    case 85:
      return "Slight Snow Shower";
    case 86:
      return "Heavy Snow Shower";
    case 95:
      return "Thunderstorm";
    case 96:
      return "Thunderstorm with slight hail";
    case 99:
      return "Thunderstorm with heavy hail";
  }
}
async function printForecast() {
  $(".resources").fadeOut();
  setTimeout(async () => {
    current = window.weatherText;
    link = `https://api.open-meteo.com/v1/forecast?latitude=${current.lat}&longitude=${current.longi}&current=temperature_2m,is_day,weather_code,wind_speed_10m,wind_direction_10m&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,wind_direction_10m_dominant&timezone=auto&past_days=2&forecast_days=3`;
    forecast = await GetData(link);
    $("#cityName").html(current.name);
    $("#currentFlag").attr("src", "/site/img/flags/" + current.flag + ".png");
    const date = new Date().toLocaleTimeString("en-US", {
      hour: "2-digit",
      minute: "2-digit",
      hour12: false,
      timeZone: forecast.timezone,
    });
    $("#currentTime").html(date);
    if (forecast.current.is_day === 1) {
      $(".day-night").html("Day");
    } else {
      $(".day-night").html("Night");
    }
    $("#currentT").html(forecast.current.temperature_2m + "°C");
    for (let index = 0; index < 5; index++) {
      if (index !== 2) {
        v = `${forecast.daily.time[index]} <span class="temp-details">Max: <span class="max-temp">${forecast.daily.temperature_2m_max[index]}</span>°C, Min: <span class="min-temp">${forecast.daily.temperature_2m_min[index]}</span>°C</span>`;
      } else {
        v = `Today <span class="temp-details">Max: <span class="max-temp">${forecast.daily.temperature_2m_max[index]}</span>°C, Min: <span class="min-temp">${forecast.daily.temperature_2m_min[index]}</span>°C</span>`;
      }
      $("#t" + index.toString()).html(v);
    }
    $("#currentW").attr(
      "src",
      "/site/img/w_icons/" + forecast.current.weather_code + ".png"
    );
    $("#currentWT").html(CodeToText(forecast.current.weather_code));
    for (let index = 0; index < 5; index++) {
      if (index !== 2) {
        w = `${
          forecast.daily.time[index]
        } :<div class="weather"><img src="/site/img/w_icons/${
          forecast.daily.weather_code[index]
        }.png"><span class="weather-text">${CodeToText(
          forecast.daily.weather_code[index]
        )}</span></div>`;
      } else {
        w = `Today :<div class="weather"><img src="/site/img/w_icons/${
          forecast.daily.weather_code[index]
        }.png"><span class="weather-text">${CodeToText(
          forecast.daily.weather_code[index]
        )}</span></div>`;
      }
      $("#w" + index.toString()).html(w);
    }
    $("#current-wSpeed").html(forecast.current.wind_speed_10m);
    $("#current-arrow").attr(
      "style",
      "transform : rotate(" + forecast.current.wind_direction_10m + "deg);"
    );
    for (let index = 0; index < 5; index++) {
      if (index !== 2) {
        wind = `${forecast.daily.time[index]} :<div class="wind-dir-item"><div id="w0-arrow" style="transform : rotate(${forecast.daily.wind_direction_10m_dominant[index]}deg);"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">${forecast.daily.wind_speed_10m_max[index]}</span> km/h</div>`;
      } else {
        wind = `Today :<div class="wind-dir-item"><div id="w0-arrow" style="transform : rotate(${forecast.daily.wind_direction_10m_dominant[index]}deg);"><img src="/site/img/arrow.svg"></div></div><div class="weather-text"><span class="max-temp">${forecast.daily.wind_speed_10m_max[index]}</span> km/h</div>`;
      }
      $("#wind" + index.toString()).html(wind);
    }
    $(".resources").fadeIn();
  }, 200);
}

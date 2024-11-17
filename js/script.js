$(document).ready(async function () {
  // data = await GetData(
  //   "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&current=temperature_2m&hourly=temperature_2m&daily=weather_code,temperature_2m_max,temperature_2m_min,wind_speed_10m_max,wind_direction_10m_dominant&timezone=auto"
  // );
  let loading = $(".loading");
  loading.hide();
  let typingTimer;
  const doneTypingInterval = 500;
  $(".searchInput").on("input", async function () {
    if ($(".searchInput").val() === "") {
      $(".searchContainer li:not(:first-child)").remove();
      printHist();
      loading.hide();
    } else {
      loading.show();
    }
    clearTimeout(typingTimer);
    typingTimer = setTimeout(async function () {
      const searchText = $(".searchInput").val();
      if (searchText.trim() !== "") {
        $(".searchContainer li:not(:first-child)").remove();
        data = await GetData(
          "https://geocoding-api.open-meteo.com/v1/search?name=" + searchText
        );
        loading.hide();
        printData(data);
      }
    }, doneTypingInterval);
  });
});

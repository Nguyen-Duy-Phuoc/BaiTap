function searchData() {
    var value = document.getElementById('keyword').value
    var WEATHER_FORECAST = "https://api.openweathermap.org/data/2.5/weather?q=" + value + "&appid=b71797aa99c76364fda574896ee36536&mode=html&nunits=%20metric&lang=en"
    var htmlContent ="";
    htmlContent += '<iframe src="' + WEATHER_FORECAST + '"></iframe>'
    document.getElementById('post-content').innerHTML = htmlContent;
}
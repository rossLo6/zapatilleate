$(document).ready(function() {

    $.getJSON("https://raw.githubusercontent.com/rossLo6/trabajo-final-javascript/main/news.json", function(data) {

        var ul = $("<ul class='news'></ul>");

        $.each(data, function(key, val) {
            var li = $("<li id='" + key + "' class='news-item'></li>");
            var author = $("<h3></h3>").text(val.author);
            var title = $("<h4></h4>").text(val.title);
            var content = $("<p></p>").text(val.content);
            var image = $("<div class='image'/>").css('background-image', 'url("' + val.urlToImage + '")');
            title.click(function() {
                window.location.href = val.url;
            });
            li.append(author, title, image, content);
            ul.append(li);
        });

        $("#news-container").append(ul);
    })
});
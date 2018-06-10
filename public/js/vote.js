$(function () {


    // Start Rate
    var postId = 0;
    $('.vote').on('click', function (event) {
        event.preventDefault();
        articleId = event.target.parentNode.id;
        var isvote = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlvote,
            data: {isvote: isvote, articleId: articleId, _token: token}
        })
            .done(function () {
                event.target.innerText = isvote ? event.target.innerText == 'Up' ? 'You up this article' : 'Up' : event.target.innerText == 'Down' ? 'You down this article' : 'Down';
                if (isvote) {
                    event.target.nextElementSibling.innerText = 'Down';
                } else {
                    event.target.previousElementSibling.innerText = 'Up';
                }
            });
    });
    // End Rate


});



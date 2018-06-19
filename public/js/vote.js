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
                event.target.innerText = isvote ? event.target.innerText == `+1` ? `-` : '+1' : event.target.innerText == '-1' ? `+` : '-1';
                if (isvote) {
                    event.target.nextElementSibling.innerText = '-1';
                } else {
                    event.target.previousElementSibling.innerText = '+1';
                }
            });
    });
    // End Rate


});



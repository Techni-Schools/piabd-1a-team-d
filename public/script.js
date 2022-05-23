$(document).ready(function() {

    $('#loginForm').submit(function(event) {
        event.preventDefault();

        var user = event.target[0].value;
        var password = event.target[1].value;

        if (user && password) {
            var url = '/api/login';
            var data = { user, password };

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: successFn
            });

            function successFn (data) {
                console.log(data);
            }
        }
    });

});
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#submit").click(function () {
        const url = "/posts/create";
        $.ajax({
            url: url,
            data: {
                text: $("#text").val()
            },
            method: "POST"
        });
        return false;
    });
    windows.Echo.channel('post')
        .listen('Posted', (e) => {
            $("#board").append('<li>' + e.post.text + '</li>');
        });
});

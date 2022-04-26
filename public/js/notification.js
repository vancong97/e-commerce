var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    encrypted: true,
    cluster: "ap1"
});
var channel = pusher.subscribe('NotificationEvent');
    channel.bind('send-message', function(data) {
    var newNotificationHtml = `<a class="dropdown-item" href="#"><span> Bạn có 1 đơn hàng mới ${ data }</span></a>`;
    let notification = parseInt($('.notification').text()) + 1;
    $('.notification').text(notification)
    $('.menu-notification').prepend(newNotificationHtml);
});

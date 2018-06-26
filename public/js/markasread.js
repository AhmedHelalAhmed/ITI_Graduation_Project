function markNotificationsAsRead(notificationsCount) {
    if(notificationsCount!=='0'){
        $.get('/markAsRead');
    }

}
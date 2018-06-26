<template>
    <li class="nav-item dropdown" onclick="markNotificationsAsRead({{ count(auth()->user()->unreadNotifications) }})">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="glyphicon glyphicon-globe"></span> Notifications <span
                class="badge badge-light">{{ unreads.length }}</span>


        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


            <a class="dropdown-item"
               href="#">

                {{ $notification->data['user']['name'] }} comment
                on {{ $notification->data['article']['title'] }}
            </a>

            <div class="dropdown-divider"></div>
        </div>

    </li>
</template>

<script>
    export default {
        props: ['unread', 'userId'],
        mounted() {
            console.log('Component mounted.');
            Echo.private(`App.User.${userId}`)
                .notification((notification) => {
                    console.log(notification);
                });
        }
    }
</script>

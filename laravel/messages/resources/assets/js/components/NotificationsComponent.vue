<template>
    <div class="dropdown-menu">
        <a :href = "'/users/' + notification.data.follower.username" class="dropdown-item" v-for = "notification in notifications">
            @{{ notification.data.follower.username }} is following you.
        </a>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notifications: [],
            }
        },
                  
        mounted(){
            console.log('Component mounted. Notifications')
            
            axios.get('/api/notifications/')
                .then( response => {
                    this.notifications = response.data;
                });
            console.log('Component mounted. Notifications')
        }
       
        
    }
</script>

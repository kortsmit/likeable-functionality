<template>
    <div class="likeable" v-cloak>
        <a v-on:click="like"
           v-bind:class="{ liked: liked }">
            <i class="fa fa-heart"
               v-bind:class="{ liked: liked }"></i>
        </a>
        <small>{{ likes }}</small>
    </div>
</template>

<script>
    export default {
        name: 'likeable',

        data() {
            return {
                liked: false,
                likes: Math.floor(Math.random() * (1000 - 0 + 1)) + 0
            }
        },

        methods: {

            like () {
                this.liked = ! this.liked;
                this.incrementLikes()
            },

            incrementLikes () {
                if(this.liked) {
                    this.likes++
                } else {
                    this.likes--
                }

            }

        },

        mounted() {
            console.log('Likeable mounted.')
        }
    }
</script>


<template>
    <div class="likeable" v-cloak>
        <a v-on:click="handleClick"
           v-bind:class="{ liked: liked }">
            <i class="fa fa-heart"
               v-bind:class="{ liked: liked }"></i>
        </a>
        <small>{{ likeCount }}</small>
    </div>
</template>

<script>
    export default {
        name: 'likeable',

        props: {
            total_like_count: {
                required: true
            },
            user_liked: {
                required: true
            },
            post_id: {
                required: true
            }
        },

        data() {
            return {
                liked: this.user_liked,
                likeCount: this.total_like_count,
                postId: this.post_id
            }
        },

        methods: {

            handleClick () {
                if ( this.liked ) {
                    this.unlike()
                } else {
                    this.like()
                }
            },

            like () {
                console.log('running like')
                this.liked = ! this.liked

                axios.get('/posts/' + this.postId + '/likes')
                    .then(function (response) {
                        console.log(response)
                        self.likeCount = response.data
                        //this.setLikeCount()
                    })
                    .catch(function (error) {
                        // nothing for now
                    })
            },

            unlike () {
                console.log('running unlike')
                this.liked = ! this.liked

                axios.delete('/posts/' + this.postId + '/likes')
                    .then(function (response) {
                        console.log(response)
                        self.likeCount = response.data
                        //this.setLikeCount()
                    })
                    .catch(function (error) {
                        // nothing for now
                    })
            },

            setLikeCount (count) {
                this.likeCount = count
            }

        },

        mounted() {
            console.log('Likeable mounted.')
        }
    }
</script>


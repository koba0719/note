<template>
    <button @click="click" class="btn btn-large rounded-circle"
            v-bind:class="{'btn-outline-primary': !isLike, 'btn-primary': isLike}">
        <i class="fa fa-thumbs-up like-thumbs"></i>
    </button>
</template>

<script>
    import axios from 'axios';

    export default {

        props: {
            like_status: String,
            post_id: String,
            user_id: String,
        },
        data: function () {
            return {
                isLike: false,
            };
        },
        name: "like",
        methods: {
            click: function () {
                // this.isLike = !this.isLike;
                console.log("Button onClick");
                if (this.isLike) {
                    axios.post('/api/unlike', {
                            post_id: this.post_id,
                            user_id: this.user_id
                        }
                    )
                        .then(response => {
                            this.isLike = false
                        })
                        .catch(e => {
                            if (e.response.status === 400) {
                                console.error("BadRequest")
                            }
                        })
                } else {
                    axios.post('/api/like', {
                            post_id: this.post_id,
                            user_id: this.user_id
                        }
                    )
                        .then(response => {
                            this.isLike = true;
                        })
                        .catch(e => {
                            if (e.response.status === 400) {
                                console.error("BadRequest")
                            }
                        })
                }
            },
        },
        created() {
            this.like_status === "1" ? this.isLike = true : this.isLike = false;
            console.log(this.isLike);
        }
    }
</script>

<style scoped>

</style>

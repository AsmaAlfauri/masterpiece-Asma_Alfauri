<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(blog)">
            <i  class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(blog)">
            <i  class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['blog', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(blog) {
                axios.post('/favorite/'+blog)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(blog) {
                axios.post('/unfavorite/'+blog)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>

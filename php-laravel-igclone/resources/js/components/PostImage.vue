<template>
    <div >
        <img id="picfull" data-tilt data-tilt-max="2.6" data-tilt-easing="cubic-bezier(.03,.98,.52,.99)" data-tilt-scale="1.04" data-tilt-glare data-tilt-max-glare="0.13" data-tilt-reverse="false"  v-on:load="vanillaTilt" v-bind:src="source" alt="" class="w-100 h100">
    </div>
</template>


<script>
    import VanillaTilt from "vanilla-tilt";

    export default {
        props: ['post'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
            }
        },
        methods:{
            vanillaTilt() {
                VanillaTilt.init(document.querySelector('#picfull'))
            }
        },

        computed: {

            source(){
                return "/storage/" + this.post
            }

        }
    }

</script>


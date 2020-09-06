<template>
    <div>
        <button data-tilt data-tilt-axis="x" data-tilt-scale="1.15" data-tilt-max="10" data-tilt-glare data-tilt-max-glare="0.1"  data-tilt-easing="cubic-bezier(.03,.98,.52,.99)" data-tilt-reverse="true" id="follow-btn" v-on:mousemove="init" @click="followUser" v-text="buttonText"></button>
    </div>
</template>


<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.follows,
            }
        },
        methods: {
            init(){
                VanillaTilt.init(document.querySelector('#follow-btn'))
            },
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
                let follows = document.getElementById("followNumber").innerHTML
                if (this.status && parseInt(follows) !==0 ){
                    document.getElementById("followNumber").innerHTML = parseInt(follows) - 1 + " followers";
                }else if(!this.status) {
                    document.getElementById("followNumber").innerHTML = parseInt(follows) + 1 + " followers";
                }
            }
        },
        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>


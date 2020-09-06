<template>
    <div>
         <button  style="border: none; padding: 0; color: transparent; background-color: transparent; ">
             <img @click="likePost" id="likeBtn" style="height: 50px; width: 50px" v-bind:src="buttonImg" alt="">
         </button>
    </div>
</template>


<script>
    export default {
        props: ['postId', 'likers'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.likers,
            }
        },
        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = !this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
                let likes = document.getElementById("likesNumber").innerHTML
                if (this.status){
                    document.getElementById("likesNumber").innerHTML = parseInt(likes) - 1;
                }else if(!this.status) {
                    document.getElementById("likesNumber").innerHTML = parseInt(likes) + 1;
                }
            }
        },
        computed: {
            buttonImg() {
                return (this.status) ? '/images/liked.png' : '/images/like.png';
            },
            change(){
                if(this.stats){

                }
            }

        }
    }
</script>


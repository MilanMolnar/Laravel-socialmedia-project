<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                message : ''
            };
        },
        methods:{
            send(e){
                e.preventDefault();
                if(this.message === ''){
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>x

<style lang="scss" scoped>
    .composer textarea{
        width: 96%;
        margin: 10px;
        resize: none;
        border-radius: 4px;
        border: 1px dimgray solid;
        padding: 6px;
    }
    .composer textarea:focus{
        background: rgba(106, 229, 215, 0.38);
    }
</style>


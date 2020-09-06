<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to === contact.id ? ' sent' : ' recieved'}`" :key="message.id" >
                <div class="text">
                    {{message.text}}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods:{
            scrollToBottom(){
                setTimeout(()=> {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: {
            contact(contact){
                this.scrollToBottom();
            },
            messages(messages){
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .feed{
        background: rgb(9,252,223);
        background: linear-gradient(0deg, rgba(9, 252, 223, 0.39) 6%, rgba(149,199,231,0.17130602240896353) 52%, rgba(187,238,226,0.19931722689075626) 84%);  min-height: 470px;
        max-height: 470px;
        overflow-y: scroll;

        ul{
            list-style-type: none;
            padding: 5px;

            li{
                &.message {
                    margin: 10px 0;
                    width: 100%;

                    .text{
                        max-width: 400px;
                        border-radius: 5px;
                        padding: 12px;
                        display: inline-block;

                    }

                    &.recieved{
                        text-align: left;

                        .text{
                            background: #5fb0c4;
                            color: white;
                        }
                    }

                    &.sent{
                        text-align: right;

                        .text{
                            background: lightseagreen;
                            color: white;
                        }
                    }

                }
            }
        }
    }
</style>

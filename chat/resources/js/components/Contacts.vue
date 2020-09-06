<template>
    <div class="contacts">
        <ul>
            <li v-for="( contact, index) in contacts" :key="contact.id" @click="selectedContact(index, contact)" :class="{'selected' : index == selected}">
                <div class="avatar">
                    <img :src="contact.profile_image" alt="profilepic">
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contacts:{
                type: Array,
                default : []
            }
        },
        data(){
            return{
                selected: 0
            };
        },
        methods:{
            selectedContact(index, contact){
                this.selected = index;
                this.$emit('selected', contact)
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

    .contacts{
        flex: 2;
        max-height: 600px;
        overflow-y: scroll;
        border-left: 1px solid dimgrey;

        ul{
            list-style-type: none;
            padding-left: 0;

            li{
                display: flex;
                padding: 2px;
                border-bottom: 1px solid #aaaaaa;
                height: 80px;
                position: relative;
                cursor: pointer;

                &.selected{
                    background: lightblue;
                    color: white;
                }

                .avatar{
                    flex: 1;
                    display: flex;
                    align-items: center;

                    img{
                        width:35px;
                        border-radius: 50%;
                        margin: 0 auto;
                    }
                }

                .contact{
                    flex: 3;
                    font-size: 12px;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;

                    p{
                        margin: 0;

                        &.name{
                            font-weight: bold;
                        }
                    }
                }
            }
        }
    }

</style>

<template>
    <div class="custom-menu-options">
        <template v-for="option in this.data" :key="option.id">
            <menu-button
                :id="option.id"
                :text="option.text"
                :route="option.route"
                :emmit="option.emmit">
            </menu-button>
        </template>
    </div>
  
</template>

<script>
import MenuButton from './MenuButton.vue';

export default {
  components: { MenuButton },
    props:['data'],
    data(){
        return{
        }
    },
    methods:{

    },
    created(){
    }
}
</script>

<style>

.custom-menu-options{
    width:89%;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content: flex-start;
    margin-top:3vh;
}
</style>
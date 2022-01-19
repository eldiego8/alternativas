<template>
  <div class="button-wrap">
      <button :id="id">{{text}}</button>
  </div>
</template>

<script>
export default {
    props:['text', 'route', 'emmit', 'id'],
    created(){
    }
}
</script>

<style>

.button-wrapper{
    border:1px solid #ccc;
    border-radius:13px;
    background:rgb(24, 137, 241);
    display:flex;
    align-items:center;
    justify-content: space-evenly;
    align-items: center;
    padding:5px;
    margin-right:1vw;
    margin-left:1vw;
}

.button-wrapper button{
    color:white;
    font-size:16px;
    text-transform: uppercase;
}


</style>
<template>
  <div class="title-container">
      <h5>{{subtitle}}</h5>
      <h1>{{title}}</h1>
  </div>
</template>

<script>
export default {
    props:['title', 'subtitle'],
}
</script>

<style>

.title-container{
    width:100%;
    display:flex;
    align-items:center;
    justify-content: space-evenly;
    flex-direction:column;
    margin-top:1vh;
    margin-bottom:2vh;
}

.title-container h5{
    font-size:16px;
    font-weight:700;
    color:#fa432b;
    text-transform: uppercase;
}

.title-container h1{
    font-size:24px;
    font-weight:700;
    color:black;
}

</style>
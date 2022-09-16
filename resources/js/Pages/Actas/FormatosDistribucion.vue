<template>

    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded space" v-if="!this.show_distribution" @click.prevent="this.show_distribution = true;">Ver distribución/formato</button>
    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded space" v-if="this.show_distribution" @click.prevent="this.show_distribution = false;">Ocultar Distribución</button>
    <template v-if="this.show_distribution">
        <div class="section-desc">
            <p>
                Esta es la distribución general de los elementos que pueden personalizarse.
            </p>
        </div>
        <div class="a4-sim">
            <div class="default-style" style="justify-content:flex-start;">
                Logo
            </div>
            <div>
                <h1 class="title-font">Título</h1>
            </div>
            <ul class="two-line-right">
                <li>Lugar: Ciudad</li>
                <li>Fecha: dd/mm/aaaa</li>
            </ul>
            <div class="default-style" style="justify-content:flex-start; margin-bottom:1vh;">
            <p class="subtitle-font">Párrafo de presentación</p>
            </div>
            <div class="default-style" style="justify-content:flex-start; margin-top:1vh;">
            <p class="control-font">Párrafo de contenido #1…</p>
            </div>
            <div class="default-style" style="justify-content:flex-start; margin-top:1vh;">
            <p class="control-font">Párrafo de contenido #2…</p>
            </div>
            <div class="default-style" style="justify-content:flex-start; margin-top:1vh;">
            <p class="control-font">Párrafo de contenido #3 … </p>
            </div>
            <div class="default-style" style="justify-content:flex-start; margin-top:1vh;">
            <p class="control-font">Párrafo de contenido... #15…</p>
            </div>
            <div class="default-style" style="margin-top:3vh;">
            <h3 class="subtitle-font">Atentamente</h3>
            </div>
            <div class="default-style" style="justify-content:space-evenly; margin-top:1vh;">
            <ul>
                <li>Columna para Firmas</li>
            </ul>
            <ul>
                <li>Columna para Firmas</li>
            </ul>
            </div>
        </div>
    </template>
</template>

<script>
export default {

    data(){
        return{
            show_distribution: false,
        }
    }

}
</script>

<style>
.a4-sim{
    padding:8px;
    border:1px solid #aaa;
    margin-top:2vh;
    margin-bottom:2vh;
    width:34vw;
    height:55vw;
    display:flex;
    align-items:center;
    flex-direction:column;
    justify-content: space-evenly;
}

.two-line-right{
    display:flex;
    align-items:flex-end;
    flex-direction:column;
    width:100%;
    justify-content: flex-end;
}

.default-style{
    width:100%;
    display:flex;
    align-items:center;
    justify-content: space-evenly;
}

.control-font{
    font-size:15px;
    font-weight:500;
    margin-top:1vh
}

.title-font{
    font-size:18px;
    font-weight:700;
    text-transform:uppercase;
}

.subtitle-font{
    font-size:16px;
    font-weight:600;
}

</style>
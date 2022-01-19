<template>
<div class="filter-selector-big">
    <div value="optionsParent" ref="filterItems" class="filter-options-horizontal">
        <div id="0" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="0" class="item-filter active-item" >
                <span id="0">Agua Para Siempre</span>
            </div>
        </div>
        <div ref="singleoption" id="1" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="1" class="item-filter">
                <span id="1" value="span">Nueva Obra</span>
            </div>
        </div>
        <div ref="singleoption" id="2" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="2" class="item-filter">
                <span id="2" value="span">Ver/Editar Obra</span>
            </div>
        </div>
        <div ref="singleoption" id="3" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="3" class="item-filter">
                <span id="3" value="span">Agregar Estudio</span>
            </div>
        </div>
        <div ref="singleoption" id="4" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="4" class="item-filter">
                <span id="4" value="span">Actas y Convenio</span>
            </div>
        </div>
        <div ref="singleoption" id="4" class="single-filter-option">
            <div value="goodone" @click.prevent="setActive" id="5" class="item-filter">
                <span id="5" value="span">Descriptores</span>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    data(){
        return{
            selection: 0,
        }
    },
    methods:{
        setActive(elem){
            this.selection = elem.target.id;
            var element = elem.target;
            while(element.getAttribute('value') != 'optionsParent'){
                element = element.parentElement;
            }
                element.childNodes.forEach(child => {
                    if(child.firstElementChild){
                        if(child.firstElementChild.id == this.selection){
                            child.firstElementChild.classList.add('active-item');
                }else{
                    child.firstElementChild.classList.remove('active-item');
                    }
                }
            });
            this.$emit("selectElement", this.selection);
        },
    }
}
</script>

<style>
.dynamic-container{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: center;
    width:96%;
    border:1px solid #ddd;
    border-radius:13px;
    background:white;
    margin-top:3vh;
    margin-bottom:3vh;
}

.dyn-cont-option{
    height:100%;
    flex-grow:1;
    text-align:center;
    font-size:19px;
    font-weight:500;
    border:1px solid #ddd;
    border-bottom:3px solid #ddd;
    background:#eee;
    color:black;
    border-top:none;
    cursor:pointer;
    transition:.3s all ease-in-out;
}

.dyn-cont-option:hover{
    border-bottom:3px solid #e84043;
    background:white;
}

.active-option{
    border-bottom:3px solid #e84043;
    background:white !important;
}

.filter-selector-big {
    background:white;
    width: 100%;
    margin-top: 1vh;
    margin-bottom: 3vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    border-radius:13px;
    border:1px solid #ddd;
}

.filter-options-horizontal {
    width: 99%;
    white-space: nowrap;
    overflow-x: scroll;
}

.single-filter-option {
    display: inline-flex;
    margin: 2vh 3vw 2vh 3vw;
    cursor: pointer;
}

.item-filter {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    height: 5vh;
    background: white;
    border:1px solid #ccc;
    color:#333;
    border-radius: 13px;
    padding: 2vh;
    transition: .3s all ease-in-out;
}

.active-item{
    background:rgb(0, 112, 240);
    color:white;
    border:1px solid white;
}

.item-filter span{
    font-size:18px;
}
</style>
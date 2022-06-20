<template>
<Head title="Agua Para Siempre" />
<BreezeAuthenticatedLayout>
    <template #header>
        <h2 style="color:white;" class="font-semibold text-xl text-white-800 leading-tight">
            Control de Obras
        </h2>
    </template>

    <div class="wrapper">
        <crear-usuario />
        <tabla-usuarios />
    </div>

</BreezeAuthenticatedLayout>



</template>


<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CrearUsuario from '../Admin/CrearUsuario.vue';
import TablaUsuarios from '../Admin/TablaUsuarios.vue';

export default {
     components: { BreezeAuthenticatedLayout, Head, CrearUsuario, TablaUsuarios },
}

</script>

<style>

body{
    background:#f9f9ff;
}

.wrapper{
    display:flex;
    justify-content:space-evenly;
    width:95%;
    margin:auto;
    margin-top:5vh;
}

</style>
import { onMounted } from 'vue';
<template>
  <div class="bg-white shadow-md table-wrap">
      <h3 style="font-size:21px; font-weight:600;">Usuarios Registrados</h3>
      <table class="table-auto" style="margin:5vh auto;">
            <thead>
                <tr>
                    <th class="px-6 py-2">ID</th>
                    <th class="px-6 py-2">Nombre</th>
                    <th class="px-6 py-2">Correo</th>
                    <th class="px-6 py-2">Tipo Usuario</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="usr in this.users" :key="usr.id">
                    <tr>
                        <td :id="usr.id" class="border px-6 py-2">{{usr.id}}</td>
                        <td class="border px-6 py-2">{{usr.name}}</td>
                        <td class="border px-6 py-2">{{usr.email}}</td>
                        <td class="border px-6 py-2">{{usr.tipo_usuario}}</td>
                    </tr>
                </template>
            </tbody>
        </table>
  </div>
</template>

<script>
export default {
    props:[],
    data(){
        return{
            users:[],
        }
    },
    methods:{
        getUsers(){
            axios.get('/admin/users')
            .then(res => this.users = res.data)
            .catch(err => console.error(err));
        }
    },
    created(){
        this.getUsers();
    }
}
</script>

<style>

.table-wrap{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
    border-radius:8px;
    padding:8px;

}

</style>
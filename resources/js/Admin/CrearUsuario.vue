<template>
<div class="w-full max-w-xs">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Nombre
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nombre de usuario">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Correo
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Correo Electrónico">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Contraseña
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="**************">
    </div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Permisos de Usuario
    </label>
    <div class="flex justify-center">
      <div>
        <div class="form-check">
          <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="1" id="flexCheckDefault">
          <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
            Administrador (1)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="2" id="flexCheckChecked" checked>
          <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
            Restringido (2)
          </label>
        </div>
      </div>
    </div>
    
    <div class="flex items-center justify-between" style="margin-top:2vh;">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Crear Usuario
      </button>
    </div>
  </form>
 
</div>
</template>

<script>
export default {
  data(){
    return{
      user:[],
      name:null,
      email:null,
      usr_type:null,
      formdata: new FormData(),
    }
  },

  methods:{
    addUser(){
      this.user.push({
        'name': this.name,
        'email': this.email,
        'usr_type': this.usr_type
      });
    },

    postUser(){
      this.formdata.append('user', JSON.stringify(this.user));

      axios.post('/admin/user/new', this.formdata)
      .then(res => console.log(res))
      .catch(err => console.error(err));
    }
  }
}
</script>

<style>

</style>
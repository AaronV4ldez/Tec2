<template>
    <div class="container">
        <h5 class="py-4">Agregar</h5>
        <form action="">

            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Precio:</label>
                <input type="Number" min="1" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Condicion:</label>
                <select class="form-control" id="">
                    <option value="nuevo">Nuevo</option>
                    <option value="usado">Usado</option>
                </select>    
            </div>
            <div class="form-group">
                <label for="">Descripcion:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Envio:</label>
                <select class="form-control" id="">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>    
            </div>
            <div class="form-group">
                <label for="">Stock:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Size:</label>
                <input type="text" placeholder="Talla" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status:</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Categoria:</label>
                <select class="form-control" id="">
                    <option value="true">Si</option>
                    <option value="false">No</option>
                </select>    
            </div>
            <div class="form-group mt-1 mt-2">
                <button class="btn btn-outline-primary">
                    <i class="fa fa-plus"></i> Agregar
                </button>
            </div>

        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    export default{
        name:'ProductAddComponent',
        data(){
            return{
                categorys:[]
            }
        },
        async mounted() {
            let response= await axios.get('http://localhost:8000/api/categorys')
            this.categorys = response.data.data
        },
}
</script>
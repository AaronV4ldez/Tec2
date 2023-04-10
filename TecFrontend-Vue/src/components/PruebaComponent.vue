<template>
    <div id="cuadrado">
        <h1 v-on:mouseenter="hover">Hola Mundo {{ cont }}</h1>
        <button @click="test">Click Me</button>
        <div v-if="oculto">Hola</div>

        <input type="text" v-model="txtTexto">
        <button @click="add">Agregar</button>
        <ul>
            <li v-for="x in data" v-bind:key="x.id">{{ x.valor }}</li>
        </ul>
    </div>
</template>

<script>
    export default{
        name:'PruebaComponent',
        data(){
            return{
                cont:0,
                oculto:false,
                txtTexto:'',
                data:[]
            }
        },
        methods: {
            test(){
                this.cont = this.cont + 1
                this.oculto = this.cont % 2 ==0
            },
            hover(){
                this.cont+=2
                this.oculto = this.cont % 2 ==0
            },
            add(){
                this.cont++
                this.data.push({
                    id:this.cont,
                    valor:this.txtTexto
                })
            },
        }
    }
</script>

<style>
    #cuadrado{
        background-color: cadetblue;
    }
</style>
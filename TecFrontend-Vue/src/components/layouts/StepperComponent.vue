<template>
    <div class="wrapper-stepper">
        <div class="stepper">
        <div class="class stepper-progress">
            <div class="stepper-progress-bar" :style="'width:' + stepperProgress "></div>
        </div>
        <!--inicio de stepper1-->
     <div class="stepper-item" :class="{'current': step == item, 'sucess': step>item}" v-for="item in 5" :key="item">
        <div class="stepper-item-counter">
            <img src="" alt="" class="icon-success">
            <span class="number">
                {{item}}
            </span>
        </div>
        <span class="stepper-item-title">
            Paso {{item}}
        </span>
     
            </div>
        </div><!--stepper1-->
        <!--Contenido de stepper1-->
        <div class="stepper-content">
            <div class="stepper-pane">
                <HomeComponent />
            </div>
        </div>
        <!--Fin del contenido del stepper1-->
        <div class="controls">
            <button class="btn" @click="step--" :disabled="step ==1">
                Anterior
            </button>
            <btton class="btn btn--green-1" @click="step++" :disabled="step == 4">
                Siguiente
            </btton>
        </div>
    </div>
</template>

<script>
import HomeComponent from '@/views/admin/home/HomeComponent.vue';

    export default{
    data: () => ({
        step: 1
    }),
    computed: {
        stepperProgress(){
            return( 100 / 4 ) * (this.step - 1 ) + '%'
        }
    },
    components: { HomeComponent }
}
</script>
<style lang="scss">
    @import "@/components/layouts/stepper_component.scss";
</style>

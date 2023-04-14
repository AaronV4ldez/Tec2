<template>
  
  <StepperComponent/>
</template>

<script>
import StepperComponent from './layouts/StepperComponent.vue';

export default {
    name: "HelloWorld",
    props: {
        msg: String
    },
    components: { StepperComponent }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>

</style>

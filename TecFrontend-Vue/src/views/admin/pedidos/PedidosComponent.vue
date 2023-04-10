<template>
    <HeaderComponent/>
    <div class="row">
        <aside class="col-3">
            <SidebarComponent/>
            <!--END SIDEBAR-->
        </aside>
        <main class="col-10">
            



        </main>
        </div>
</template>
<script>
    import HeaderComponent from '@/components/layouts/HeaderComponent.vue'
    import SidebarComponent from '@/components/layouts/SidebarComponent.vue'
    export default{
        name:'PedidosComponent',
        components:{
            HeaderComponent,
            SidebarComponent
        }
    }
    
</script>
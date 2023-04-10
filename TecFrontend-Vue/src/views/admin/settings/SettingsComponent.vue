<template>
    <div>
        <HeaderComponent/>
        <div class="row">
            <aside class="col-2">
                <SidebarComponent/>
            <!--END SIDEBAR-->
            </aside>
            <main class="col-10">
            <section class="h-100 gradient-custom-2">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                style="width: 150px; z-index: 1">
                            <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                style="z-index: 1;">
                                Edit profile
                            </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                            <h5>Andy Horwitz</h5>
                            <p>New York</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">4</p>
                                <p class="small text-muted mb-0">Compras</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-1 h5">5</p>
                                <p class="small text-muted mb-0">Ventas</p>
                            </div>
                            <div>
                                <p class="mb-1 h5">100</p>
                                <p class="small text-muted mb-0">Seguidores</p>
                            </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                            <p class="lead fw-normal mb-1">Description</p>
                            <div class="p-4" style="background-color: #f8f9fa;">
                                <p class="font-italic mb-1">Vendedor de Manga</p>
                                <p class="font-italic mb-1">Ubicado en Chihuahua, Mexico</p>
                                <p class="font-italic mb-0">Vendedor de Confianza</p>
                            </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0">Pedidos Recientes</p>
                            <p class="mb-0"><a href="#!" class="text-muted">Mostrar Todo</a></p>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </section>
                </main>
            </div>
    </div>
</template>

<script>
import HeaderComponent from '@/components/layouts/HeaderComponent.vue'
import SidebarComponent from '@/components/layouts/SidebarComponent.vue'
export default{
    name:'SettingComponent',
    components:{
            HeaderComponent,
            SidebarComponent
        }
}
</script>
<style>
.gradient-custom-2 {
/* fallback for old browsers */
background: #fbc2eb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
}
</style>
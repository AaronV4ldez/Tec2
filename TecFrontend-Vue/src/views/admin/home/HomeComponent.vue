<template>
  <div>
    <HeaderComponent/>
    <div class="row">
        <aside>
            <SidebarComponent/>
            <!--END SIDEBAR-->
        </aside>
        <div class="col-1"></div>
        <main class="col-10">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <router-link to="/admin/products" class="nav-link">
                   <img src="@/assets/img/male.png" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </router-link> 
                   <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="textbig">OFERTA RELAMPAGO</h1>
                        <p class="textsmall">Correle que se acaban!</p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                  <router-link to="/admin/products" class="nav-link">
                   <img class="imagencita" src="@/assets/img/cancun.jpg" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </router-link> 
                    <div class="container">
                    <div class="carousel-caption">
                        <h1 class="textbig2">2X1!</h1>
                        <p class="textsmall2">COMPRA 2 Y PAGA 1</p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                  <router-link to="/admin/products" class="nav-link">
                   <img class="imagencita2" src="@/assets/img/naruto.jpg" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </router-link> 
                    
                    <div class="container">
                    <div class="carousel-caption text-end">
                        <h1 class="textbig3">Naruto Vuelve!</h1>
                        <p class="textsmall3">Compra los nuevos tomos de naruto </p>
                    </div>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            <!--END MAIN CONTENT-->
        </main>
        <!--END ROW MAIN-->
    </div>
  </div>
</template>
<script>
    import HeaderComponent from '@/components/layouts/HeaderComponent.vue'
    import SidebarComponent from '@/components/layouts/SidebarComponent.vue'
    export default{
        name:'HomeComponent',
        components:{
            HeaderComponent,
            SidebarComponent
        }
    }
    
</script>

<style>
body {
  color: #5a5a5a;
}
.carousel {
  margin-bottom: 4rem;
}
.textbig{
    color: black;
    text-decoration: solid;
    text-decoration: underline;
}
.textbig2{
    color: black;
    text-decoration: solid;
    text-decoration: underline;
    text-align: right; 
}
.textbig3{
    color: black;
    text-decoration: solid;
    text-decoration: underline;
    text-align: right;
    text-align: bottom;
}
.textsmall{
  color: black;
  text-decoration: solid;
  
}
.textsmall2{
  color: black;
  text-decoration: solid;
  text-align: right;
}
.textsmall3{
  color: black;
  text-decoration: solid;
  text-align: right;
  text-align:bottom;
}
.imagencita{
  opacity: 90%;
  margin-left: 20%;
  margin-bottom:10%;
}
.imagencita2{
  opacity: 90%;
  margin-left: 20%;
  margin-top:0%;
}
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}
.carousel-item {
  height: 32rem;
  background-color:lightsteelblue;
}
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}

.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
.featurette-divider {
  margin: 5rem 0; 
}
.featurette-heading {
  letter-spacing: -.05rem;
}
@media (min-width: 40em) {

  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}
@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}
    </style>
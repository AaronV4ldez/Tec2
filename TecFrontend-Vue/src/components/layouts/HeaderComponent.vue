<template>
    <header>
        <nav class="navbar navbar-light px-4 d-flex justify-content-between" style="background-color: #2B2B2B;">
            <a href="#" class="navbar-brand text-warning">Las Mangas Del Chaleco</a>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img src="@/assets/img/user.png" class="imgProfile" alt="">
                        
                         Axel Torres
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>
<script>
    export default{
        name:'HeaderComponent'
    }
</script>
<style>
.imgProfile{
    width:30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}
</style>
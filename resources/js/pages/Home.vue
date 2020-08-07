<template>
    <div class="container content">
        <p style="font-size: 18px;">
            Informageek adalah sebuah platfrom berbasis website yang dapat digunakan
            <br>sebagai media dalam berbagi informasi tentang teknologi dan informasi. 
            <br>Informageek dapat juga disebut media sosial yang artinya setiap user bisa
            <br>saling berinteraksi dan saling berbagi informasi.
        </p>
        <div class="row">
            <div class="col-sm-6">
                <button class="join">
                    <router-link class="nav-link" :to="{name: 'register'}">
                        <p>Bergabung Sekarang</p>
                    </router-link>
                </button>
            </div>
            <div class="col-sm-6">
                <div class="image">
                    <img :src="'/media/home-img.png'" >
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Copyright Informageek 2020</p>
            <!-- <p>Teknik Informatika UIN Bandung</p> -->
        </div>
    </div>
</template>

<style>
.join{
    background: #FEDE2B;
    border-radius: 35px;
    width: 350px;
    height: 65px;
    border: 0;
}
.join p{
    font-style: normal;
    font-weight: 600;
    font-size: 26px;
    line-height: 39px;
    /* identical to box height */

    text-align: center;
    margin: 0;
    color: #232B38;
}
.content{
    margin-top: 100px;
}
.footer{
    display: flex;
    position: fixed;
    bottom: 0;
    justify-content: space-between;
    align-items: center;
}
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

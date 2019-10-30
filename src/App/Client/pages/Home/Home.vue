<template>
    <div>
        <Carousel></Carousel>
    </div>
</template>

<script>
    import Carousel from '../../components/Carousel/Carousel'

    export default {
        name: "Home",
        components: {
            Carousel
        }
    }
</script>

<style lang="scss">
    @import './Home.scss';
</style>

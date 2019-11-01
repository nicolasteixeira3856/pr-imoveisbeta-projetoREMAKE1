<template>
    <div>
        <b-row>
            <b-col lg="4">
                <Card></Card>
            </b-col>
            <b-col lg="4">
                <Card></Card>
            </b-col>
            <b-col lg="4">
                <Card></Card>
            </b-col>
        </b-row>
        <b-row>
            <b-col lg="4">
                <Card></Card>
            </b-col>
            <b-col lg="4">
                <Card></Card>
            </b-col>
            <b-col lg="4">
                <Card></Card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    import Carousel from '../../components/Carousel/Carousel';
    import Card from "../../components/Card/Card";
    import Cadastro from "../../components/Cadastro/Cadastro";

    export default {
        name: "Home",
        components: {
            Carousel,
            Card
        }
    }
</script>

<style lang="scss">
    @import './Home.scss';
</style>

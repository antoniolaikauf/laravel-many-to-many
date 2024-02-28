<script>
import axios from "axios";
export default {
    name: "Main",
    data() {
        return {
            array_Technologies: [],
        };
    },
    mounted() {
        axios
            .get("http://localhost:8000/api/v1/Technologies")
            .then((risposta) => {
                console.log(risposta.data.message);
                this.array_Technologies = risposta.data.message;
            });
    },
};
</script>

<template>
    <div class="container">
        <div class="row">
            <ul class="text-center">
                <li v-for="Technology in array_Technologies">
                    le tecnologie usate per i progetti sono :
                    {{ Technology.nome_tecnologia }}
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss">
@use "./../style/general.scss";
</style>

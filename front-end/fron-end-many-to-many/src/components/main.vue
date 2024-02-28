<script>
import axios from "axios";
export default {
    name: "Main",
    data() {
        return {
            array_Technologies: [],
            comparsa_form: true,
            componenti_form: {
                nome: "",
            },
        };
    },
    methods: {
        change() {
            this.comparsa_form = false;
        },
        creare_Technologies() {
            axios
                .post(
                    "http://localhost:8000/api/v1/Technologies",
                    this.componenti_form
                )
                .then((risposta) => {
                    console.log(risposta.data);
                    this.array_Technologies.push(risposta.data.technology);
                    console.log(this.array_Technologies);
                });
        },
    },
    mounted() {
        axios
            .get("http://localhost:8000/api/v1/Technologies")
            .then((risposta) => {
                // console.log(risposta.data.message);
                this.array_Technologies = risposta.data.message;
            });
    },
};
</script>

<template>
    <div class="container">
        <div class="row">
            <ul class="text-center" v-if="comparsa_form">
                <button style="width: 300px" @click="change">
                    crea una nuova tecnologia
                </button>
                <li v-for="Technology in array_Technologies">
                    le tecnologie usate per i progetti sono :
                    {{ Technology.nome_tecnologia }}
                </li>
            </ul>
            <div v-else>
                <form @submit.prevent="creare_Technologies">
                    <label for="nome"> inserisci il nome</label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        v-model="componenti_form.nome"
                    />
                    <input type="submit" value="crea" />
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
@use "./../style/general.scss";
</style>

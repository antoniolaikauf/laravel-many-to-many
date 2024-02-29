<script>
import axios from "axios";
export default {
    name: "Main",
    data() {
        return {
            // array con dentro tutte le technology
            array_Technologies: [],
            // variabile che permette la scomparsa e comparsa del form
            comparsa_form: true,
            // componente che si passa dentro all'axios per aggiungere un nuovo elemento
            componenti_form: {
                nome: "",
            },
            // variabile che si rierirà alla pagina attuale
            // vedere a cosa serva perchè funziona lo stesso anche se lo commenti
            currentPage: "",
            // variabile che si riferirà all'array dell apagina contenente le sue technologies
            pageLinks: [],
        };
    },
    methods: {
        // metodo per far comparire form
        change() {
            this.comparsa_form = false;
        },
        // chiamata dove si crea un nuovo utente e si passa dentro tutto l'oggetto
        creare_Technologies() {
            axios
                .post(
                    "http://localhost:8000/api/v1/Technologies",
                    this.componenti_form
                )
                .then((risposta) => {
                    this.comparsa_form = true;
                    // console.log(risposta.data);
                    // si mette dentro il contenuto che ritorna con push dentro all'array
                    this.array_Technologies.push(risposta.data.technology);
                    // console.log(this.array_Technologies);
                })
                .catch(function (error) {
                    console.log("Show error notification!" + error);
                });
        },
        // metodo che cambi pagina e va in combinazione con il metodo  gettechnologies nel back-end
        // url sarebbe il link che c'è dentro all'oggetto che permette il metodo paginate nelbackend
        changePage(url) {
            axios
                .get(url)
                .then((risposta) => {
                    console.log(risposta.data);
                    // si prende il current_page
                    // vedere a cosa serva perchè funziona lo stesso anche se si toglie
                    this.currentPage = risposta.data.message.current_page;
                    // array che ritorna qil totale di elementi deciso in paginate nel back-end
                    this.array_Technologies = risposta.data.message.data;
                    // link che bisogna mettere per far si che ti porti alla pagina  questo procedimento è gestito tutto da laravel
                    this.pageLinks = risposta.data.message.links;
                })
                .catch(function (error) {
                    console.log("Show error notification!" + error);
                });
        },
    },

    mounted() {
        // chiamato funzione con url base
        this.changePage("http://localhost:8000/api/v1/Technologies");
    },
};
</script>

<template>
    <div class="container">
        <div class="row">
            <ul class="text-center" v-if="comparsa_form">
                <!-- bottone per ar comparire il form -->
                <button style="width: 300px" @click="change">
                    crea una nuova tecnologia
                </button>
                <!-- v-if per far stamapre il ocntenuto dell'array_technologies -->
                <li v-for="Technology in array_Technologies">
                    le tecnologie usate per i progetti sono :
                    {{ Technology.nome_tecnologia }}
                </li>
                <!-- v-for per ar vedere il contenuto degli array_link che cambieranno pagina  -->
                <div v-for="link in pageLinks">
                    <button
                        @click="changePage(link.url)"
                        :href="link.url"
                        v-html="link.label"
                        :class="link.active ? 'text-info ' : ''"
                    />
                    <!-- {{ link.label }}
                    </button> -->
                </div>
            </ul>
            <!-- orm  che permette la creazione dell nuovo componente -->
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

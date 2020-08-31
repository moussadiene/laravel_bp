<template>
    <div class="row mt-4">
        <div class="col-3">
            <div class="card ">
                <div class="card-body row">
                    <img src="" class="img-responsive rounded-circle col-lg-4" alt="Profil">
                    <div class="col-lg-8">
                        <h6 class="card-title">Moussa DIENE</h6>
                        <p class="card-text"><i> Responsable</i>.</p>
                        <a href="https://github.com/moussadiene" class="btn btn-dark btn-block"  target="_blank">profil</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-9">
            <add-entreprise @entreprise-ajouter="actualiser"></add-entreprise>
            <div class="card" style="width:94%">
                <div class="card-header text-dark">Entreprise</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="col-5">Ligne</label>
                            <input type="text"  class="form-control form-control-sm col-6" value="09" readonly >
                        </div>
                        <div class="col-6">
                            <label for="">Entreprise
                                <input type="text" name="recherche" id="recherche" class="form-control form-control-sm" v-model="recherche" @keyup="rechercher">

                            </label>
                        </div>
                    </div>
                    <table id="listePhysique" class="table table-striped table-bordered table-sm table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Nom </th>
                                <th class="th-sm">Ninea</th>
                                <th class="th-sm">Adresse</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Telephone</th>
                                <th class="th-sm">Budget</th>
                                <th class="th-sm">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="entreprise in listes.data" :key="entreprise.id">
                                <td>{{ entreprise.nom }}</td>
                                <td>{{ entreprise.ninea }}</td>
                                <td>{{ entreprise.adresse }}</td>
                                <td>{{ entreprise.email }}</td>
                                <td>{{ entreprise.telephone }}</td>
                                <td>{{ entreprise.budget }}</td>
                                <td>
                                    <div class="">
                                        <a type="button" class="btn btn-secondary btn-sm col-5" data-toggle="modal" data-target="#editEntrepriseModal" @click="getEntreprise(entreprise.id)">
                                        edit
                                        </a>&nbsp;
                                        <a type="button" class="btn btn-danger btn-sm col-5" @click="deleteEntreprise(entreprise.id)">
                                            sup
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :data="listes" @pagination-change-page="getResultats" class="mt-3 pagination-sm align-right"></pagination>
                </div>
            </div>
        <!-- v-bind est une methode qui permet des passer des valeur d'une page vue en un autre -->
            <edit-entreprise v-bind:entreprise="entreprise" @entreprise-modifier="actualiser"></edit-entreprise>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                listes:{},
                entreprise : '',
                recherche : ''
            }
        },

        created(){
            axios.get('http://127.0.0.1:8000/listeEntreprise')
                .then(response => this.listes = response.data)
                .catch(error => console.log(error))
        },
        // fonction de vue pour la definistion de l'ensemble de mes methodes de ma page
        methods : {
                 // Our method to GET results from a Laravel endpoint
            getResultats(page = 1) {
                axios.get('http://127.0.0.1:8000/listeEntreprise?page=' + page)
                    .then(response => {
                        this.listes = response.data;
                    })
            },
            // pour le bouton edit
            getEntreprise(id){
                axios.get('http://127.0.0.1:8000/entreprises/edit/' + id)
                    .then(response => this.entreprise =  response.data )
                    .catch(error => console.log(error))
            },

            deleteEntreprise(id){
                axios.delete('http://127.0.0.1:8000/entreprises/destroy/' + id)
                    .then(response => {
                        this.listes = response.data;
                    })
                    .catch(error => console.log(error))
            },
            rechercher(){
                if(this.recherche.length > 2 ){
                    axios.get('http://127.0.0.1:8000/listeEntreprise/'+ this.recherche )
                        .then(response => this.listes = response.data)
                        .catch(error => console.log(error))
                }else{
                    axios.get('http://127.0.0.1:8000/listeEntreprise')
                        .then(response => this.listes = response.data)
                        .catch(error => console.log(error))
                }

            },
            actualiser(listes) {
                this.listes = listes.data
            }

        },
        mounted() {
            console.log('Component Entreprise.')
        }

    }
</script>

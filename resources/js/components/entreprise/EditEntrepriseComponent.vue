<template>
    <div class="row col-12 mb-3">
        <!-- Modal -->
        <div class="modal fade" id="editEntrepriseModal" tabindex="-1" role="dialog" aria-labelledby="editEntrepriseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEntrepriseModalLabel" >Modifier Entreprise </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="nom" class="col-sm-3 col-form-label">Nom </label>
                        <div class="col-sm-9">
                            <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom de 'l'entreprise"  v-model="entreprise.nom" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ninea" class="col-sm-3 col-form-label">Ninea </label>
                        <div class="col-sm-9">
                            <input name="ninea" type="text" class="form-control" id="ninea" placeholder="Ninea de 'l'entreprise" v-model="entreprise.ninea" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adresse" class="col-sm-3 col-form-label">Adresse </label>
                        <div class="col-sm-9">
                            <input name="adresse" type="text" class="form-control" id="adresse" placeholder="Adresse de 'l'entreprise" v-model="entreprise.adresse" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telephone" class="col-sm-3 col-form-label">Telephone </label>
                        <div class="col-sm-9">
                            <input name="telephone" type="text" class="form-control" id="telephone" placeholder="Telephone de 'l'entreprise" v-model="entreprise.telephone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Telephone de 'l'entreprise" v-model="entreprise.email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Budget </label>
                        <div class="col-sm-9">
                            <input name="budget" type="number" class="form-control" id="budget" placeholder="Telephone de 'l'entreprise" v-model="entreprise.budget" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-dark" @click="modifier" data-dismiss="modal">Enregistrer</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {

        // recuperation des proprietes de entreprise qu'on doit modifier
        props : ['entreprise'],
        methods : {

            modifier(){
                axios.patch('http://127.0.0.1:8000/entreprises/edit/'+ this.entreprise.id,{
                            nom : this.entreprise.nom,
                            ninea : this.entreprise.ninea,
                            adresse : this.entreprise.adresse,
                            email : this.entreprise.email,
                            telephone : this.entreprise.telephone,
                            budget :  parseFloat(this.entreprise.budget)
                        })
                    .then(response =>  this.$emit('entreprise-modifier' , response))
                    .catch(error => console.log(error))
            }
        },

        mounted() {
            console.log('Component Entreprise.')
        }

    }
</script>

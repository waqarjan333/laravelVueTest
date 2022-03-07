<template>
    <div class="container">
        <h2 class="text-center">Create Card</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link
                    :to="{ name: 'CardIndex' }"
                    class="btn btn-primary btn-sm float-right mb-2"
                    >Back</router-link
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="card.firstname"
                        />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="card.lastname"
                        />
                    </div>
                    <div class="form-group">
                        <label>Membership</label>
                        <select class="form-control" v-model="card.membership">
                            <option value="" selected>Select Membership</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="Plantinum">Plantinum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea
                            type="text"
                            rows="5"
                            class="form-control"
                            v-model="card.description"
                        ></textarea>
                    </div>

                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="createCard()"
                    >
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            card: {},
        };
    },
    methods: {
        createCard() {
            this.axios
                .post("http://127.0.0.1:8000/api/cards", this.card)
                .then((response) => this.$router.push({ name: "CardIndex" }))
                .catch((err) => console.log(err))
                .finally(() => (this.loading = false));
        },
    },
};
</script>

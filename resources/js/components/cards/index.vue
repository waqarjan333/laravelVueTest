<template>
    <div class="container">
        <h2 class="text-center">Cards List</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link
                    :to="{ name: 'CardCreate' }"
                    class="btn btn-primary btn-sm float-right mb-2"
                    >Add Card</router-link
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Membership</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(card, key) of cards" v-bind:key="key">
                            <td>{{ key + 1 }}</td>
                            <td>{{ card.firstname }}</td>
                            <td>{{ card.lastname }}</td>
                            <td>{{ card.membership }}</td>
                            <td>{{ card.description }}</td>
                            <td>
                                <router-link
                                    class="btn btn-success btn-sm"
                                    :to="{
                                        name: 'CardEdit',
                                        params: { cardId: card.id },
                                    }"
                                    >Edit</router-link
                                >
                                <button
                                    class="btn btn-danger btn-sm"
                                    @click="deleteCard(card.id)"
                                >
                                    Delete
                                </button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cards: {},
        };
    },
    created() {
        this.getCards();
    },
    methods: {
        getCards() {
            this.axios
                .get("http://127.0.0.1:8000/api/cards")
                .then((response) => {
                    this.cards = response.data;
                });
        },
        deleteCard(cardId) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/cards/${cardId}`)
                .then((response) => {
                    let i = this.cards.map((data) => data.id).indexOf(cardId);
                    this.cards.splice(i, 1);
                });
        },
    },
};
</script>

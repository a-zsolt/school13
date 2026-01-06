Vue.createApp({
    data() {
        return {
            searchTerm: "",
            newTitle: "",
            newType: "movie",
            newTotalEpisodes: 10,
            items: [
                {
                    id: 1,
                    title: "Breaking Bad",
                    type: "series",
                    currentEpisode: 1,
                    totalEpisodes: 62,
                },
                {
                    id: 2,
                    title: "Inception",
                    type: "movie",
                    watched: true
                },
                {
                    id: 3,
                    title: "Stranger Things",
                    type: "series",
                    currentEpisode: 3,
                    totalEpisodes: 42,
                }
            ]
        }
    },
    computed: {
        filteredItems() {
            const term = this.searchTerm.toLowerCase();
            return this.items.filter((item) => item.title.toLowerCase().includes(term));
        }
    },
    methods: {
        addNewItem() {
            const newItem = {
                id: Date.now(),
                title: this.newTitle,
                type: this.newType
            };
            if (this.newType === "movie") {
                newItem.watched = false;
            }
            else {
                newItem.currentEpisode = 0;
                newItem.totalEpisodes = this.newTotalEpisodes;
            }
            this.items.push(newItem);
            this.newTitle = "";
            this.newType = "";
            this.newTotalEpisodes = 0;
        }
    }
}).mount('#app');
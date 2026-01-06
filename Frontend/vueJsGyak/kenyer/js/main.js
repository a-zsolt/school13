
Vue.createApp({
    data() {
        return {
            newName: "",
            newType: "búza",
            newRatio: "",
            newStartDate: "",
            starters: []
        }
    },
    methods: {
        addNewStarter() {
            this.starters.push({
                id: Date.now(),
                name: this.newName,
                type: this.newType,
                ratio: this.newRatio,
                startDate: this.newStartDate,
                feedings: []
            });
            this.newName = "";
            this.newRatio = "";
            this.newStartDate = "";
        },
        addFeeding(starter) {
            const feedDate = new Date().toLocaleDateString('hu-HU');
            const feedTime = new Date().toLocaleTimeString('hu-HU');
            starter.feedings.push({
                date: feedDate,
                time: feedTime
            });
        }
    }
}).mount('#app')
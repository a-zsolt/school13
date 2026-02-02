<script>
import ShoppingItem from "@/components/ShoppingItem.vue";

export default {
  name: "App",
  components: {ShoppingItem},
  data() {
    return {
      products: [],
      newName: "",
      newQty: 1
    }
  },
  methods: {
    addItem() {
      if (!this.newName) return
      if (this.newQty < 1) return

      this.products.push({
        id: crypto.randomUUID(),
        name: this.newName,
        qty: this.newQty,
        bought: false
      });

      this.newName = "";
      this.newQty = 1;
    },
    removeItem(id) {
      this.products = this.products.filter(product => product.id !== id);
    },
    updateQty(id, delta){
      const product = this.products.find(product => product.id === id);
      if (!product) return
      if (delta == '+') {
        product.qty = product.qty + 1;
      } else if (delta == '-') {
        if (product.qty <= 1) return;
        product.qty = product.qty - 1;
      }
    },
    toggleBought(id){
      const product = this.products.find(product => product.id === id);
      if (!product) return
      product.bought = !product.bought;
    }
  },
  computed: {
    totalItems() {
      return this.products.length;
    },
    boughtCount() {
      return this.products.filter(product => product.bought).length;
    },
    remainingCount() {
      return this.products.filter(product => !product.bought).length;
    }
  }
}
</script>

<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-md">
      <a class="navbar-brand">Bevásárlólista</a>
      <div class="p-2 navbar-text hstack gap-2">
        <span>Összes termék: {{ totalItems }} </span>
        <span><i class="bi bi-bag-check"></i>: {{ remainingCount }}</span>
        <span><i class="bi bi-bag-check-fill"></i>: {{ boughtCount }}</span>
      </div>
    </div>
  </nav>

  <main class="container mt-2 vstack gap-2">
    <section>
      <h3>Termék hozzáadása</h3>
      <form class="row" @submit.prevent="addItem">
        <div class="col-12 col-sm-5">
          <div class="input-group">
            <span class="input-group-text">Név:</span>
            <input type="text" class="form-control" placeholder="termék" v-model="newName">
          </div>
        </div>
        <div class="col-12 col-sm-2">
          <div class="input-group">
            <span class="input-group-text">Mennyiség:</span>
            <input type="number" class="form-control" v-model="newQty">
          </div>
        </div>
        <div class="col-12 col-sm-2">
          <button type="submit" class="btn btn-primary w-100">Hozzáadás</button>
        </div>
      </form>
    </section>

    <section>
      <h3>Termékek</h3>
      <div class="row vstack gap-2 ps-3 pe-3">
        <ShoppingItem v-for="item in products" :key="item.id" :item="item"
                      @remove="removeItem" @changeQty="updateQty" @toggleBought="toggleBought"/>
      </div>
    </section>
  </main>
</template>

<style scoped>

</style>

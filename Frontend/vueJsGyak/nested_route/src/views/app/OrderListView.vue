<script>
export default {
  name: "OrderListView",
  data(){
    return{
      orders:[
        {orderId: 'ORD-001', total: 12990, status: 'Paid'},
        {orderId: 'ORD-002', total: 45990, status: 'Processing'},
        {orderId: 'ORD-003', total: 9990, status: 'Shipped'},
      ]
    }
  },
  methods:{
    open(o){
      this.$router.push({name: 'order-details', params: {orderId:o.orderId}, query: this.$route.query});
    }
  }
}
</script>

<template>
<section>
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="h4 mb-0">Orders</h1>
    <span class="badge text-bg-success">param validate</span>
  </div>
  <div class="list-group">
    <div v-for="o in orders" :key="o.orderId" class="list-group-item list-group-item-action" @click="open(o)">
      <div class="d-flex justify-content-between">
        <div class="fw-semibold">{{o.orderId}}</div>
        <div>{{o.total.toLocaleString('hu-Hu')}} Ft</div>
      </div>
      <div class="small text-muted">{{o.status}}</div>
    </div>
  </div>
</section>
</template>

<style scoped>

</style>
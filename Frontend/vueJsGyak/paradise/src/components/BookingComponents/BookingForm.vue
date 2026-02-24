<script>
export default {
  name: "BookingForm",
  props: {
    restaurant: {type: Object, required: true, default: null},
  },
  data(){
    return {
      customerName: '',
      data: '',
      time: '',
      people: 2
    }
  },
  methods:{
    submit(){
      if (!this.customerName || !this.date || !this.time || !this.people){
        return
      }
      this.$emit('create:booking', {
        restaurantId: this.restaurant.id,
            date: this.data,
            time: this.time,
            people: this.people,
          customerName: this.customerName,
      });
      this.customerName = '';
      this.time = '';
      this.date = '';
      this.people = 2;
    }
  }
}
</script>

<template>

</template>

<script>
export default {
  name: "TaskItem",
  props: {
    task: {type: Object, required: true},
  },
  emits: ['update', 'toggle', 'remove'],
  computed: {
    badgeClass(){
      return {
        high: this.task.priority === "high",
        medium: this.task.priority === "medium",
        low: this.task.priority === "low",
      }
    }
  },
  methods: {
    onBlur(event) {
      const title = event.target.textContent.trim();
      if (title && title !== this.task.title) {
        this.$emit('update', {title});
      }
    }
  }
}
</script>

<template>
  <div class="task" :class="{done: task.done}">
    <input type="checkbox" :checked="task.done" @change="$emit('toggle')">
    <div class="title" @blur="onBlur">{{ task.title }}</div>
    <span class="badge" :class="badgeClass">{{task.priority}}</span>
    <button @click="$emit('remove')">Remove</button>
  </div>
</template>

<style scoped>

</style>
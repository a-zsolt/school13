<script>
  import TaskItem from "@/components/TaskItem.vue";

  export default {
    name: "TaskList",
    components: {TaskItem},
    props: {
      tasks: {type: Array, required: true},
    },
    emits: ['toggle', 'update', 'delete'],
  }
</script>

<template>
  <section>
    <TaskItem v-for="task in tasks" :key="task.id" :task="task"
              @toggle="$emit('toggle', task.id)"
              @remove="$emit('remove', task.id)"
              @update="$emit('update', task.id, $event)"
    />
  </section>
</template>

<style scoped>

</style>
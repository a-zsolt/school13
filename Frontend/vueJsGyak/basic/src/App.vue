<script>
import TaskForm from "@/components/TaskForm.vue";
import TaskList from "@/components/TaskList.vue";

const LS_KEY = "tasksData";
export default {
  name: "App",
  components: {
    TaskForm,
    TaskList,
  },
  data() {
    return {
      tasks: [],
      search: "",
      filter: "all"
    }
  },
  created() {
    try {
      const savedTasks = JSON.parse(localStorage.getItem(LS_KEY));
      if (savedTasks) this.tasks = savedTasks || [];
    } catch (_) {}
  },
  computed: {
    filteredTasks() {
      const q = this.search.toLowerCase();
      return this.tasks.filter(t => this.filter === "all" || (this.filter === "active" ? !t.done : t.done)).filter(t => t.title.toLowerCase().includes(q));
    }
  },
  watch: {
    tasks: {
      handler(value) {
        localStorage.setItem(LS_KEY, JSON.stringify(value));
      },
      deep: true
    }
  },
  methods: {
    addTask(title, priority) {
      if (!priority || !title) return;
      this.tasks.unshift({
        id: crypto.randomUUID(),
        title,
        priority,
        done: false,
        createdAt: Date.now(),
      });
    },
    updateTask(id, patch) {
      const index = this.tasks.findIndex(task => task.id === id);
      if (index > -1) this.tasks[index] = {...this.tasks[index], ...patch};
    },
    removeTask(id) {
      this.tasks = this.tasks.filter(task => task.id !== id);
    },
    toggleTask(id) {
      const task = this.tasks.find(task => task.id === id);
      if (task) task.done = !task.done;
    }
  }
}

</script>

<template>
<main class="container">
  <h1>Task <small>(Vue Options Api)</small></h1>
  <TaskForm @addTask="addTask" />
  <section class="toolbar">
    <input type="text" v-model.trim="search" placeholder="Keresés..."/>
    <div class="filters">
      <button :class="{active: filter === 'all'}" @click="filter='all'">Mind</button>
      <button :class="{active: filter === 'active'}" @click="filter='active'">Aktív</button>
      <button :class="{active: filter === 'done'}" @click="filter='done'">Kész</button>
    </div>
  </section>
  <TaskList :tasks="filteredTasks" @update="updateTask" @remove="removeTask" @toggle="toggleTask" />
</main>
</template>

<style scoped>

</style>

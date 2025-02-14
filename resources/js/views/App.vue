<script>
import {defineComponent} from "vue";
import AppLayout from "../layout/AppLayout.vue"

export default defineComponent({
  components: {AppLayout},
});
</script>
<template>
  <router-view/>
</template>
<style lang="scss">
#app {
  width: 100vw;
  overflow-x: hidden;
  font-family: "Arial", sans-serif;
}
</style>

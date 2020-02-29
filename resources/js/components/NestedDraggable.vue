<template>
  <draggable
    tag="ul"
    :list="nav"
    :group="{ name: 'g1' }"
    class="pb-1 mb-1 bg-gray"
  >
    <li
      v-for="(node, index) in nav"
      :key="index"
      @click.stop="onClick(node)"
    >
      <span v-if="node.open">-</span>
      <span v-else>+</span>
      {{ node.name }}
      <nested-draggable
        v-if="node.open"
        :nav="node.children"
      />
    </li>
  </draggable>
</template>

<script>
import Draggable from "vuedraggable";
export default {
  name: "NestedDraggable",
  components: {
    Draggable,
  },
  props: {
    nav: {
      required: true,
      type: Array,
    }
  },
  methods: {
    onClick(node) {
      this.$set(node, 'open', !node.open);
    }
  },
};
</script>
<style scoped>
  ul {
    list-style-type: none;
  }
</style>

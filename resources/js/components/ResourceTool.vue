<template>
  <div>
    <heading class="mb-6">
      Tree Builder
    </heading>

    <!-- <pre v-text="JSON.stringify(nav, null, 2)" /> -->

    <nested-draggable
      v-if="nav"
      :nav="nav"
    />

    <div class="flex w-full justify-end mt-2">
      <button
        class="btn btn-default btn-icon bg-primary pull-right text-white"
        @click="onClick"
      >
        Update
      </button>
    </div>
  </div>
</template>

<script>
// import {Draggable} from 'vuedraggable'
import NestedDraggable from "./NestedDraggable";
export default {
    components: {
      NestedDraggable,
    },
    props: {
      resourceName: {type: String, required: true},
      resourceId: {type: [Number, String], required: true},
    },
    data() {
      return {
        nav: null,
      };
    },
    mounted() {
      this.fetchNavigationElements();
    },
    methods: {
      fetchNavigationElements() {
        axios.get(`/nova-vendor/nova-tree-builder-tool/nav/${this.resourceId}/structure`)
          .then(({data}) => {
            this.nav = data;
          });
      },
      onClick() {
        axios.put(`/nova-vendor/nova-tree-builder-tool/nav/${this.resourceId}/structure`, this.nav);
      }
    },
}
</script>

<style>
  .he-tree {
    width: 50%;
    min-width: 300px;
  }

  .tree-node-inner {
    padding: 5px;
    border: 1px solid #ccc;
    cursor: pointer;
  }

  .draggable-placeholder-inner {
    border: 1px dashed #0088F8;
    box-sizing: border-box;
    background: rgba(0, 136, 249, 0.09);
    color: #0088f9;
    text-align: center;
    padding: 0;
    display: flex;
    align-items: center;
  }
</style>

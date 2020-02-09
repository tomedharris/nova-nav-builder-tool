<template>
  <div>
    <heading class="mb-6">
      Nav Builder
    </heading>

    <draggable-tree
      v-if="nav"
      :data="nav"
      draggable
    >
      <div slot-scope="{data, store}">
        <template v-if="!data.isDragPlaceHolder">
          <b
            v-if="data.children && data.children.length"
            @click="store.toggleOpen(data)"
          ><span v-if="data.open">-</span><span v-else>+</span>&nbsp;</b>
          <span v-text="data.text" />
        </template>
      </div>
    </draggable-tree>
  </div>
</template>

<script>
import {DraggableTree} from 'vue-draggable-nested-tree'
export default {
    components: {
        DraggableTree,
    },
    props: ['resourceName', 'resourceId', 'field'],
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
            axios.get(`/nova-vendor/nova-nav-builder-tool/nav/${this.resourceId}/root-elements`)
                .then(({data}) => {
                  this.nav = data.map(this.mapApiNavToUi);
                });
        },
        mapApiNavToUi({name, children}) {
          return {
            text: name,
            children: children.map(this.mapApiNavToUi),
          }
        },
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

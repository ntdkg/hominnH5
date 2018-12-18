<template>
  <div class="page pageTemp">
    <img src="@/images/imgPage.jpeg">
  </div>
</template>
<style scoped>
  .pageTemp {
    background-color: white;
    width: 100%;
    height: auto;
    overflow: scroll;
  }
  img {
    width: 100%;
    height: auto;
  }

</style>
<script type="text/javascript">
  import $ from 'jquery';

  export default{
    data() {
      return {

      };
    },
    filters: {
    },
    computed: {
    },
    methods: {
    },
    on: {
      pageInit(event, page) {
        this.page = page;
        console.log(page.view.id + ': page init ' + page.route.url);
      },
      pageReinit(event, page) {
        console.log(page.view.id + ': page reinit ' + page.route.url);
      },
      pageBeforeIn(event, page) {
        console.log(page.view.id + ': page before in ' + page.route.url);
      },
      pageAfterIn(event, page) {
        console.log(page.view.id + ': page after in ' + page.route.url);

        $('.view').css({
          'overflow' : "scroll"
        })
      },
      pageBeforeOut(event, page) {
        console.log(page.view.id + ': page before out ' + page.route.url);
      },
      pageAfterOut(event, page) {
        console.log(page.view.id + ': page after out ' + page.route.url);
      },
      pageBeforeRemove(event, page) {
        console.log(page.view.id + ': page before remove ' + page.route.url);
      }
    },
    mounted() {
      
    }
  }
</script>
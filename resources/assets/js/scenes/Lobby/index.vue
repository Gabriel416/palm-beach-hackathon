<template lang="html">
  <section>
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex xs12>
            <div v-if="!showReadyButton">
                <div class="headline connecting">Connecting you to a STEM Professional...</div>
                <img class="beaker" src="/images/beakerloader.gif" />
            </div>
            <div v-else>
                <div class="headline connecting">A STEM Professional is ready to answer your question</div>
                <button @click="$router.push('/app/video')" class="link waves-effect waves-light btn">Connect Now</button>
            </div>
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>

  <script>
import axios from "axios";

export default {
  data: function() {
    return {
      showReadyButton: false
    };
  },

  mounted() {
    setTimeout(() => (this.showReadyButton = true), 3793);
  },
};
</script>

  <style>
.connecting {
  color: #fff;
}

.beaker {
  margin-top: 25px;
  height: 100px;
}

.link {
  text-align: center;
  background-color: #ffb800;
  color: white;
  font-weight: bold;
  width: 50%;
  margin: 20px 0px 10px 0px;
}
</style>
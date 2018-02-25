<template lang="html">
  <section>
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex xs12>
          <v-card color="primary">
            <v-card-text class="px-0">
              <div>Local</div>
              <div id="local-media-div"></div>
              <div>Remote</div>
              <div id="remote-media-div"></div>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>

  <script>
import axios from "axios";
const { createLocalVideoTrack } = require("twilio-video");

export default {
  data: function() {
    return {
      loaded: false
    };
  },

  mounted() {
    axios
      .get("/get_twilio_token")
      .then(res => {
        console.log(res);
        Twilio.Video.connect(res.data).then(
          function(room) {
            console.log("Successfully joined a Room: ", room);

            room.localParticipant.tracks.forEach(track => {
              console.log(track);
              document
                .getElementById("local-media-div")
                .appendChild(track.attach());
            });

            room.on("participantConnected", function(participant) {
              console.log("A remote Participant connected: ", participant);

              participant.on("trackAdded", track => {
                document
                  .getElementById("remote-media-div")
                  .appendChild(track.attach());
              });
            });
          },
          function(error) {
            console.error("Unable to connect to Room: " + error.message);
          }
        );
      })
      .catch(err => console.log(err));
  }
};
</script>

  <style>

</style>
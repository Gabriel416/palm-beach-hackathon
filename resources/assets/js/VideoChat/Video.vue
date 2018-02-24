<template lang="html">
    <section>
        <div style="color: black; font-size: 54px;">VIDEO CHAT WOULD BE HERE</div>
    </section>
</template>

<script>
//GETTERS
// import { mapGetters } from 'vuex';
export default {
  data: function() {
    return {
      loaded: false
    };
  },

  mounted() {
    console.log("Component mounted.");
    Twilio.Video.connect(
      "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiJTS2Y1MzE5MTExNmZiNGQwOGRmMmMyYzkzNTMwZjE2YmUyLTE1MTk0OTc2NzAiLCJpc3MiOiJTS2Y1MzE5MTExNmZiNGQwOGRmMmMyYzkzNTMwZjE2YmUyIiwic3ViIjoiQUM3NTM1MWUxMDdiNDMwNGIwMDdhY2I3NGQwYzZlOWFmMCIsImV4cCI6MTUxOTUwMTI3MCwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiR2FicmllbCIsInZpZGVvIjp7InJvb20iOiJ0ZXN0In19fQ.vboM6A9_-qIipBoGLC_fEaeEr_EyvaO-xhMHvsoXli8",
      { name: "my-new-room" }
    ).then(
      function(room) {
        console.log("Successfully joined a Room: ", room);
        room.on("participantConnected", function(participant) {
          console.log("A remote Participant connected: ", participant);
        });
      },
      function(error) {
        console.error("Unable to connect to Room: " + error.message);
      }
    );
  },

  methods: {}
};
</script>
<style>

</style>
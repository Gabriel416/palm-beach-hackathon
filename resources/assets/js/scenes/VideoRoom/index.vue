<template lang="html">
  <section>
    <v-container grid-list-md text-xs-center>
      <div class="video-room-container">
        <img src="/images/logo.png">
      </div>
      <div class="video-wrapper">
        <div id="local-media-div" v-bind:class="{ 'local-media-div--position': showJoin }" >
          <div class="video-loader">Loading...</div>
        </div>
        <div v-if="showJoin" class="video-thanks">
          <p class="video-status">Dickbutt has joined the channel.</p>
          <p class="video-status">Do you accept?</p>
          <div>
            <button @click="acceptVideo" class="video-accept waves-effect waves-light btn">Yes</button>
            <button @click="acceptVideo" class="video-accept waves-effect waves-light btn">No</button>
          </div>
        </div>
        <div v-if="showEnd" id="video-thanks" class="video-thanks">
          <p class="video-status">Rate Your Experience</p>
          <div @click="videoEnd" class="star-wrapper">
            <i class="far fa-star video-star"></i>
            <i class="far fa-star video-star"></i>
            <i class="far fa-star video-star"></i>
            <i class="far fa-star video-star"></i>
            <i class="far fa-star video-star"></i>
          </div>
        </div>
      </div>
      <!-- <div id="remote-media-div"></div> -->

      <div class="col-md-6 offset-md-4 video-button-container">
          <button @click="endCall" type="submit" class="waves-effect waves-light btn register">
              END CHAT
          </button>
      </div>
    </v-container>
  </section>
</template>

  <script>
import axios from "axios";
const { createLocalVideoTrack } = require("twilio-video");

export default {
  data: function() {
    return {
      loaded: false,
      showJoin: false,
      showEnd: false
    };
  },
  methods: {
    endCall() {
      const myFace = document.getElementById("local-media-div").firstChild;
      document.getElementById("local-media-div").removeChild(myFace);
    
      this.showEnd = true;
    },
    acceptVideo() {
      this.showJoin = false;
    },
    videoEnd() {
      console.log(document)
      document.getElementById("video-thanks").innerHTML = "Thanks!"
    }
  },
  mounted() {
    const that = this;
    axios
      .get("/get_twilio_token")
      .then(res => {
        console.log(res);
        Twilio.Video.connect(res.data).then(
          (room) => {
            
            room.localParticipant.tracks.forEach(track => {
              const myFace = document.getElementById("local-media-div").firstChild;
              document.getElementById("local-media-div").removeChild(myFace);
              document
                .getElementById("local-media-div")
                .appendChild(track.attach());
            });

            room.on("participantConnected", function(participant) {
              console.log("A remote Participant connected: ", participant);
              that.showJoin = true;
              participant.on("trackAdded", track => {
                const myFace = document.getElementById("local-media-div").firstChild;
                document.getElementById("local-media-div").removeChild(myFace);
                document
                  .getElementById("local-media-div")
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
.video-room-container {
  margin-bottom: 30px;
}
.register {
  text-align: center;
  background-color: #FFB800;
  color: white;
  font-weight: bold;
  width: 50%;
  margin: 20px 0px 10px 0px;
}
.video-button-container {
  margin-top: 30px;
}

video {
  width: 500px;
  border-radius: 20px;
}

.video-loader {
  width: 500px;
  margin: 0 auto;
  height: 375px;
  font-size: 50px;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
}

.video-thanks {
  position: relative;
  font-weight: bold;
  border-radius: 10px;
  padding: 15px;
  background-color: white;
  width: 500px;
  margin: 0 auto;
  height: 375px;
  font-size: 50px;
  display: flex;
  font-size: 25px;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.video-wrapper {
  position: relative;
}

.video-status {
  font-size: 28px;
}

.local-media-div--position {
  position: absolute;
  left: 50%;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
}

.video-accept {
  text-align: center;
  background-color: #FFB800;
  color: white;
  font-weight: bold;
  margin: 10px;
}

.star-wrapper {
  unicode-bidi: bidi-override;
  direction: rtl;
}

.video-star {
  cursor: pointer;
}

.star-wrapper > .video-star:hover,
.star-wrapper > .video-star:hover ~ .video-star {
  color: #FFB800;
}

.full-height {
  background-color: black;
  background-image: url("/images/Rectangle.png");
}
</style>
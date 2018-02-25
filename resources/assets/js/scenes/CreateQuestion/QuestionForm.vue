<template lang="html">
  <section>
    <v-toolbar class="app-toolbar">
        <img src="/images/seeds-logo.png" alt="seeds logo">
  </v-toolbar>
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex xs12>
            <div class="headline question-text">I have a question!</div>

            <div class="job-wrapper">
                <p class="display-1 subject-text">Choose a subject:</p>
                <div class="job-card" @click="science" v-bind:class="{ active: subject == 'science'}">
                    <img src="/images/science.png" alt="science">
                </div>
                 <div class="job-card" @click="tech"  v-bind:class="{ active: subject == 'technology'}">
                    <img src="/images/technology.png" alt="technology">
                </div>
                 <div class="job-card" @click="engineering" v-bind:class="{ active: subject == 'engineering'}">
                    <img src="/images/engineering.png" alt="engineering">
                </div>
                 <div class="job-card" @click="math" v-bind:class="{ active: subject == 'mathematics'}">
                    <img src="/images/math.png" alt="mathematics">
                </div>
               <v-form v-model="valid" class="vue-form">
                <v-text-field
                label="Subject"
                v-model="subjectLine"
                required
                ></v-text-field>
                <v-text-field
                label="Question"
                v-model="title"
                required
                ></v-text-field>
            </v-form>
             <button  class="waves-effect waves-light btn submit" @click.preventDefault="submitQuestion"> 
                            Submit
            </button>
            </div>
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>

  <script>
export default {
  data: function() {
    return {
      loaded: false,
      subject: "",
      subjectLine: "",
      title: ""
    };
  },

  mounted() {
    console.log("mounted");
  },

  methods: {
    science() {
      this.subject = "science";
    },
    tech() {
      this.subject = "technology";
    },
    engineering() {
      this.subject = "engineering";
    },
    math() {
      this.subject = "mathematics";
    },
    submitQuestion() {
      console.log("hello");
      axios
        .post("/question", {
          subject: this.subject,
          title: this.title,
          subjectLine: this.subjectLine,
          classroom_id: window.user.classroom.id
        })
        .then(function(response) {
          console.log(response);
          //   this.$router.push({ path: "/app/lobby" });
        })
        .catch(function(error) {
          alert(error);
        });
    }
  }
};
</script>

  <style scoped>
.full-height {
  background: url("/images/whitebg.png") no-repeat;
}
.app-toolbar {
  background-color: #fbfbfb;
  height: 150px;
  position: absolute;
  top: 0;
  left: 0;
}

.app-toolbar img {
  background: transparent;
  margin: 80px auto 0 auto;
}
git .question-text {
  color: #fff;
}

.job-wrapper {
  width: 80%;
  margin: 30px auto 0 auto;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.subject-text {
  width: 90%;
  display: flex;
  justify-content: flex-start;
  margin: 20px auto 15px auto;
  margin-left: 30px;
  color: #fff;
}

.job-card {
  width: 20%;
  cursor: pointer;
  border-radius: 5px;
  margin-right: 2.5%;
  margin-left: 2.5%;
  background-color: #fff;
  -webkit-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.32);
  -moz-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.32);
  box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.32);
}

.submit {
  width: 90%;
  margin: 0 auto;
  text-align: center;
  background-color: #ffb800;
  color: #fff;
  font-weight: bold;
  width: 100%;
  margin: 20px 0px 10px 0px;
}

.text-field {
  width: 100%;
}

.vue-form {
  width: 80%;
  margin: 25px auto 20px auto;
  color: #000;
  font-size: 20px;
  font-weight: bold;
}

.input-group--text-field label {
  color: #fff !important;
}

.category-radio {
  visibility: hidden;
}

.active {
  border: 5px solid #ffb800;
}
</style>
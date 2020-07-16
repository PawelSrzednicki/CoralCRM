<template>
  <v-row no-gutters align="stretch" justify="center">
    <v-col xs="12" sm="12" md="12" lg="4" xl="4">
      <v-card height="100%" class="transparent" tile>
        <v-img
          src="/images/smartcity.jpg"
          gradient="to top right, rgba(0,0,0,.50), rgba(25,32,72,.7)"
          height="100%"
          cover
        >
          <v-row
            align="center"
            justify="center"
            class="lightbox white--text pa-1 fill-height mx-auto"
          >
            <v-col cols="12" sm="6">
              <div class="subheading">
                “How you gather, manage and use information will determine
                whether you win or lose.”
              </div>
              <div class="body-1 text-right">-Bill Gates</div>
            </v-col>
          </v-row>
        </v-img>
      </v-card>
    </v-col>
    <v-col xs="10" sm="12" md="12" lg="4" xl="4">
      <v-card height="100%" tile>
        <v-row align="center" justify="center" class="fill-height">
          <v-col cols="12" sm="6">
            <v-card-title class="justify-center">
              <span class="#007EA3">Coral</span>
              <span class="pl-1 font-weight-light  primary--text">CRM</span>
            </v-card-title>
            <v-card-text>
              <div v-if="error">
                <v-alert text type="error">
                  {{ error.message }}
                </v-alert>
              </div>
              <v-form autocomplete="off">
                <v-text-field
                  v-model="email"
                  id="email"
                  label="Email"
                  name="email"
                  :rules="emailRules"
                  prepend-inner-icon="mdi-account"
                  type="text"
                  required
                  filled
                />

                <v-text-field
                  v-model="password"
                  id="password"
                  label="Password"
                  name="password"
                  :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                  :rules="passwordRules"
                  @click:append="show1 = !show1"
                  prepend-inner-icon="mdi-lock"
                  :type="show1 ? 'text' : 'password'"
                  required
                  filled
                />
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-spacer />
              <v-btn @click="login" outlined large color="#007EA3">Login</v-btn>
              <v-spacer />
            </v-card-actions>
          </v-col>
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>

<style lang="scss" scoped></style>
<script>
export default {
  layout: "clean",
  data() {
    return {
      error: null,
      show1: false,
      valid: false,
      email: "",
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+/.test(v) || "E-mail must be valid"
      ],
      password: "",
      passwordRules: [v => !!v || "Password is required"]
    };
  },

  methods: {
    login() {
      this.error = null;
      return this.$auth
        .loginWith("local", {
          data: {
            email: this.email,
            password: this.password
          }
        })
        .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data : e.toString();
        });
    }
  }
};
</script>

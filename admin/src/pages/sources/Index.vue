<template>
  <section>
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h4 class="card-title">Заметки</h4>
                <b-button
                  size="sm"
                  variant="success"
                  @click="createSource()"
                  class="mr-1"
                >
                  Создать заметку
                </b-button>
                <p>Заметки по теме</p>
              </div>
              <div class="align-self-center">
                <p class="text-muted">Заметки по теме</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">
                  <div class="text-center">
                    <b-spinner
                      v-show="loading"
                      variant="primary"
                      label="Text Centered"
                    ></b-spinner>
                  </div>
                  <div
                    class="preview-item border-bottom py-3"
                    v-for="item in items"
                    :key="item.url"
                  >
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-primary rounded">
                        <i class="mdi mdi-file-document"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <a :href="item.source" target="_blank"
                          ><h6 class="preview-subject">{{ item.name }}</h6></a
                        >
                        <p class="mb-0" v-html="item.description"></p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">{{ item.updated_at }}</p>
                        <b-button
                          variant="success"
                          class="btn-icon"
                          @click="editSource(item.id)"
                        >
                          <i class="mdi mdi-tooltip-edit"></i>
                        </b-button>
                        <b-button
                          variant="danger"
                          class="btn-icon"
                          @click="deleteSource(item.id)"
                        >
                          <i class="mdi mdi-delete"></i>
                        </b-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";

export default {
  name: "list",
  components: {},
  data() {
    return {
      idSource: "",
      items: Array,
      loading: false,
    };
  },
  methods: {
    getSources() {
      let self = this;
      this.loading = true;
      axios
        .get("/api/sources/source/" + this.$route.params.id)
        .then(function (response) {
          self.items = response.data.sources;
          console.log(response.data.sources);
          self.loading = false;
        })
        .catch(function (error) {
          console.error(error);
          self.loading = false;
        });
    },
    editSource(id) {
      this.$router.push({ path: `/sources/edit/${id}` });
    },
    createSource() {
      this.$router.push({ path: `/sources/create/${this.$route.params.id}` });
    },
    deleteSource(id) {
      this.idSource = id;
      let self = this;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/sources/delete", {
            id_source: self.idSource,
          })
          .then((response) => {
            if (response.status) {
              console.log("Вызвали алерт");
              this.getSources();
            } else {
              console.log("Не работает");
              console.log(response.status);
            }
          })
          .catch(function (error) {
            console.log(response);
            console.error(error);
          });
      });
    },
  },
  mounted: function () {
    this.getSources();
  },
  computed: {},
};
</script>
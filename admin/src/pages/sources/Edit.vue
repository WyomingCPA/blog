<template>
  <section class="forms">
    <div class="page-header">
      <h3 class="page-title">Редактирование источника</h3>
    </div>
    <div class="row">
      <div class="col-md-10 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Редактирования источника</h4>
                <p class="card-description">Заголовок источника</p>
                <form class="forms-sample" @submit.prevent="update">
                  <b-form-group label="Название" label-for="name">
                    <b-form-input
                      type="text"
                      id="name"
                      v-model="name"
                      placeholder="Название"
                    ></b-form-input>
                  </b-form-group>
                  <b-form-group label="Source" label-for="source">
                    <b-form-input
                      type="text"
                      id="source"
                      v-model="source"
                      placeholder="Source"
                    ></b-form-input>
                  </b-form-group>
                  <b-form-group>
                    <editor
                      id="description"
                      api-key="no-api-key"
                      v-model="description"
                      value=""
                      :init="{
                        height: 700,
                        menubar: true,
                        plugins: [
                          'advlist autolink lists link image charmap print preview anchor',
                          'searchreplace visualblocks code fullscreen',
                          'insertdatetime media table paste code help wordcount',
                          'codesample toc autosave',
                        ],
                        toolbar:
                          'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image \
                          formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                      }"
                    />
                  </b-form-group>
                  <div class="d-flex">
                    <b-button type="submit" variant="success" class="mr-2"
                      ><span v-show="!loading"> Обновить </span>
                      <div
                        v-show="loading"
                        class="spinner-border spinner-border-sm"
                        role="status"
                      >
                        <span class="sr-only">Loading...</span>
                      </div>
                    </b-button>
                    <b-button variant="dark">Cancel</b-button>
                  </div>
                </form>
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
import Editor from "@tinymce/tinymce-vue";

export default {
  components: {
    editor: Editor,
  },
  name: "editForm",
  data() {
    return {
      name: "",
      source: "",
      description: "",
      loading: false,
    };
  },
  methods: {
    getSourceData() {
      let self = this;
      axios
        .get("/api/sources/edit/" + this.$route.params.id)
        .then(function (response) {
          self.name = response.data.source.name;
          self.source = response.data.source.source;
          self.description = response.data.source.description;
        })
        .catch(function (error) {
          console.error(error);
        });
    },
    async update() {
      let self = this;
      this.loading = true;
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/sources/update", {
            source_id: this.$route.params.id,
            name: self.name,
            source: self.source,
            description: self.description,
          })
          .then((response) => {
            if (response.status) {
              console.log("Вызвали алерт");
              self.loading = false;
            } else {
              console.log("Не работает");
              console.log(response.status);
              self.loading = false;
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
    this.getSourceData();
  },
};
</script>